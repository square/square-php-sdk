<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\SquareClient;
use Square\Mobile\Requests\CreateMobileAuthorizationCodeRequest;

class MobileAuthorizationTest extends TestCase
{
    private static SquareClient $client;
    private static string $locationId;

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();
        self::$locationId = Helpers::getDefaultLocationId(self::$client);
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testCreateMobileAuthorizationCode(): void
    {
        $response = self::$client->mobile->authorizationCode(new CreateMobileAuthorizationCodeRequest([
            'locationId' => self::$locationId,
        ]));

        $this->assertNotNull($response->getAuthorizationCode());
        $this->assertNotNull($response->getExpiresAt());
    }
}
