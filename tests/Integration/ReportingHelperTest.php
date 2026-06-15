<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Square\Reporting\ReportingClient;
use Square\Reporting\Requests\LoadRequest;
use Square\Exceptions\SquareException;
use Square\SquareClient;
use Square\Types\LoadResponse;
use Square\Types\LoadResult;
use Square\Types\LoadResultAnnotation;
use Square\Utils\ReportingHelper;
use TypeError;

/**
 * The Reporting API answers a still-processing `/reporting/v1/load` query with an
 * HTTP 200 whose body is `{ "error": "Continue wait" }`. `ReportingHelper::loadAndWait`
 * owns the retry loop around that sentinel.
 *
 * These tests run fully offline: the `reporting` client is replaced with a stub
 * that pops a scripted sequence of responses. A "Continue wait" entry is fed as the
 * raw JSON body and deserialized through the *real* generated `LoadResponse::fromJson`,
 * so the sentinel is detected by exactly the same mechanism as in production — the
 * deserializer raising a `TypeError` on the missing, non-nullable `results` field —
 * rather than a hand-faked exception. Resolved entries are real `LoadResponse` objects.
 */
class ReportingHelperTest extends TestCase
{
    private const CONTINUE_WAIT_BODY = '{"error":"Continue wait"}';

    /** Builds a minimal, fully-valid resolved `LoadResponse` with one result row. */
    private static function resolvedResponse(): LoadResponse
    {
        return new LoadResponse([
            'results' => [
                new LoadResult([
                    'annotation' => new LoadResultAnnotation([
                        'measures' => [],
                        'dimensions' => [],
                        'segments' => [],
                        'timeDimensions' => [],
                    ]),
                    'data' => [['Orders.count' => '128']],
                ]),
            ],
        ]);
    }

    /**
     * Builds a SquareClient whose `reporting->load` returns the next scripted entry
     * (the last entry repeats once exhausted), recording the call count. A string
     * entry is deserialized via the real `LoadResponse::fromJson`; a `LoadResponse`
     * entry is returned as-is.
     *
     * @param array<string|LoadResponse> $sequence One entry per expected `load` call.
     * @param int &$callCount Receives the number of `load` invocations.
     */
    private function clientReturning(array $sequence, int &$callCount): SquareClient
    {
        $callCount = 0;
        $reporting = $this->getMockBuilder(ReportingClient::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['load'])
            ->getMock();
        $reporting->method('load')->willReturnCallback(
            function () use ($sequence, &$callCount): LoadResponse {
                $entry = $sequence[min($callCount, count($sequence) - 1)];
                $callCount++;
                // Real deserialization for the sentinel: a "Continue wait" body raises
                // a TypeError here, exactly as the generated client does in production.
                return is_string($entry) ? LoadResponse::fromJson($entry) : $entry;
            }
        );

        $client = new SquareClient('test-token');
        $client->reporting = $reporting;
        return $client;
    }

    public function testPollsPastContinueWaitAndReturnsResolvedResult(): void
    {
        $callCount = 0;
        $client = $this->clientReturning(
            [self::CONTINUE_WAIT_BODY, self::CONTINUE_WAIT_BODY, self::resolvedResponse()],
            $callCount,
        );

        $response = ReportingHelper::loadAndWait(
            $client,
            new LoadRequest(),
            ['initialDelayMs' => 1, 'maxDelayMs' => 1, 'maxAttempts' => 5],
        );

        $this->assertCount(1, $response->getResults());
        $this->assertArrayNotHasKey('error', $response->getAdditionalProperties());
        $this->assertSame(3, $callCount);
    }

    public function testReturnsImmediatelyWhenFirstResponseHasResults(): void
    {
        $callCount = 0;
        $client = $this->clientReturning([self::resolvedResponse()], $callCount);

        $response = ReportingHelper::loadAndWait($client, new LoadRequest(), ['initialDelayMs' => 1]);

        $this->assertCount(1, $response->getResults());
        $this->assertSame(1, $callCount);
    }

    public function testThrowsOnceMaxAttemptsExhausted(): void
    {
        $callCount = 0;
        $client = $this->clientReturning([self::CONTINUE_WAIT_BODY], $callCount); // never resolves

        try {
            ReportingHelper::loadAndWait(
                $client,
                new LoadRequest(),
                ['initialDelayMs' => 1, 'maxDelayMs' => 1, 'maxAttempts' => 3],
            );
            $this->fail('Expected SquareException was not thrown.');
        } catch (SquareException $e) {
            $this->assertStringContainsString('did not complete after 3 attempts', $e->getMessage());
        }
        $this->assertSame(3, $callCount);
    }

    public function testCancellationAbortsPolling(): void
    {
        $callCount = 0;
        $client = $this->clientReturning([self::CONTINUE_WAIT_BODY], $callCount); // would otherwise poll

        $this->expectException(SquareException::class);
        $this->expectExceptionMessage('cancelled');

        ReportingHelper::loadAndWait(
            $client,
            new LoadRequest(),
            ['maxAttempts' => 10, 'shouldCancel' => fn (): bool => true],
        );
    }

    /**
     * The crux of the design: the generated `reporting->load` deserializes the
     * "Continue wait" body into a TypeError (the non-nullable `results` is absent).
     * That raised TypeError is how `loadAndWait` recognizes the sentinel; if it ever
     * stops throwing, the helper would mistake "Continue wait" for a result.
     */
    public function testContinueWaitBodyRaisesTypeErrorOnDeserialization(): void
    {
        $this->expectException(TypeError::class);
        LoadResponse::fromJson(self::CONTINUE_WAIT_BODY);
    }

    /** A real (here, empty) result body deserializes cleanly, with no sentinel. */
    public function testResolvedBodyDeserializesCleanly(): void
    {
        $resolved = LoadResponse::fromJson('{"results":[]}');
        $this->assertSame([], $resolved->getResults());
        $this->assertArrayNotHasKey('error', $resolved->getAdditionalProperties());
    }
}
