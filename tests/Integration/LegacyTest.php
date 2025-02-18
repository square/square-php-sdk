<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Legacy\Authentication\BearerAuthCredentialsBuilder;
use Square\Legacy\Environment;
use Square\Legacy\SquareClient;

class LegacyTest extends TestCase
{
    private static SquareClient $legacyClient;
    public static function setUpBeforeClass(): void
    {
        self::$legacyClient = Helpers::createLegacyClient();
    }

    public function testListLocations() : void
    {
        $response = self::$legacyClient->getLocationsApi()->listLocations();

        /** @var string $body */
        $body = $response->getBody();
        $this->assertNotNull($body);
        /** @var array{locations: array<mixed>} $jsonBody */
        $jsonBody = json_decode($body, true);
        $this->assertNotNull($jsonBody['locations']);
        $this->assertGreaterThan(0, count($jsonBody['locations']));
    }
}
