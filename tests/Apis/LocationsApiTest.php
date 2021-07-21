<?php
namespace Square\Tests;

use Square\Exceptions\ApiException;
use Square\Exceptions;
use Square\ApiHelper;
use Square\Models;
use PHPUnit\Framework\TestCase;

class LocationsApiTest extends TestCase
{
    /**
     * @var \Square\Apis\LocationsApi Controller instance
     */
    protected static $controller;

    /**
     * @var HttpCallBackCatcher Callback
     */
    protected static $httpResponse;

    /**
     * Setup test class
     */
    public static function setUpBeforeClass(): void
    {
        self::$httpResponse = new HttpCallBackCatcher();
        self::$controller = ClientFactory::create(self::$httpResponse)->getLocationsApi();
    }


    /**
     * Provides information of all locations of a business.

Many Square API endpoints require a `location_id` parameter.
The `id` field of the [`Location`]($m/Location) objects returned by this
endpoint correspond to that `location_id` parameter.
     */
    public function testListLocations()
    {

        // Set callback and perform API call
        $result = null;
        try {
            $result = self::$controller->listLocations()->getResult();
        } catch (ApiException $e) {
        }

        // Test response code
        $this->assertEquals(
            200,
            self::$httpResponse->getResponse()->getStatusCode(),
            "Status is not 200"
        );
    }
}
