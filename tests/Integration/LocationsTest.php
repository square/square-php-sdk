<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\SquareClient;

class LocationsTest extends TestCase
{
    private static SquareClient $client;

    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testListLocations() : void
    {
        $response = self::$client->locations->list();

        $this->assertNotNull($response->getLocations());
        $this->assertGreaterThan(0, count($response->getLocations()));
    }
}
