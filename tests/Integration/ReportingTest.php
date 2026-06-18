<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
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
 * suite is skipped unless `TEST_SQUARE_REPORTING` is set. When enabled,
 * `TEST_SQUARE_REPORTING` itself supplies the production reporting-provisioned
 * access token used to authenticate against the production environment
 * (`TEST_SQUARE_REPORTING=<prod-reporting-token>`).
 */
class ReportingTest extends TestCase
{
    private static SquareClient $client;

    public static function setUpBeforeClass(): void
    {
        $token = getenv('TEST_SQUARE_REPORTING');
        if (!$token) {
            self::markTestSkipped('Set TEST_SQUARE_REPORTING=<prod-reporting-token> to run the Reporting API live tests against production.');
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
        // Use a lightweight measure that resolves quickly. A heavier query (e.g.
        // Orders.count) can exceed the default poll budget before the async query
        // completes; Appointments.count matches what the other SDKs' live tests use.
        $response = ReportingHelper::loadAndWait(
            self::$client,
            new LoadRequest([
                'query' => new Query([
                    'measures' => ['Appointments.count'],
                ]),
            ]),
        );

        $this->assertInstanceOf(LoadResponse::class, $response);
        $this->assertNotNull($response->getData());
    }
}
