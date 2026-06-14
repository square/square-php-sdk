<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Environments;
use Square\Reporting\Requests\LoadRequest;
use Square\SquareClient;
use Square\Types\LoadResponse;
use Square\Types\MetadataResponse;
use Square\Types\Query;
use Square\Utils\ReportingHelper;

/**
 * Live smoke test for the Square Reporting API.
 *
 * The Reporting API is **production only** — it is not available in sandbox
 * (sandbox host → 404, sandbox token against production → 401) — and requires a
 * reporting-provisioned token. To avoid breaking the default CI run, the whole
 * suite is skipped unless `TEST_SQUARE_REPORTING` is set. When enabled it reuses
 * the same `TEST_SQUARE_TOKEN` as the other integration tests, but points at the
 * production environment.
 */
class ReportingTest extends TestCase
{
    private static SquareClient $client;

    public static function setUpBeforeClass(): void
    {
        if (!getenv('TEST_SQUARE_REPORTING')) {
            self::markTestSkipped('Set TEST_SQUARE_REPORTING (with a production reporting token in TEST_SQUARE_TOKEN) to run the Reporting API live tests.');
        }

        $token = getenv('TEST_SQUARE_TOKEN');
        if (!$token) {
            throw new RuntimeException('TEST_SQUARE_TOKEN environment variable is not set.');
        }

        self::$client = new SquareClient(
            $token,
            null,
            ['baseUrl' => Environments::Production->value],
        );
    }

    public function testGetMetadataReturnsSchema(): void
    {
        $metadata = self::$client->reporting->getMetadata();
        $this->assertInstanceOf(MetadataResponse::class, $metadata);
    }

    public function testLoadAndWaitResolvesQuery(): void
    {
        $response = ReportingHelper::loadAndWait(
            self::$client,
            new LoadRequest([
                'query' => new Query([
                    'measures' => ['Orders.count'],
                ]),
            ]),
        );

        $this->assertInstanceOf(LoadResponse::class, $response);
        $this->assertIsArray($response->getResults());
    }
}
