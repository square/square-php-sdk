<?php

namespace Square\Tests;

use Square\SquareClient;
use Square\APIException;
use Square\Exceptions;
use Square\APIHelper;
use Square\Models;
use PHPUnit\Framework\TestCase;

class ErrorsTest extends TestCase
{
    public function testV1Error()
    {
        $client = new SquareClient([
            'environment' => \Square\Environment::PRODUCTION,
            'accessToken' => 'BAD_TOKEN'
        ]);

        error_reporting(E_ALL ^ E_USER_DEPRECATED);
        $response = $client->getV1LocationsApi()->listLocations();

        $this->assertEquals(401, $response->getStatusCode());
        $this->assertEquals(1, count($response->getErrors()));
        $this->assertEquals("V1_ERROR", $response->getErrors()[0]->getCategory());
        $this->assertEquals("service.not_authorized", $response->getErrors()[0]->getCode());
        $this->assertEquals("Not Authorized", $response->getErrors()[0]->getDetail());
    }

    public function testV2Error()
    {
        $client = new SquareClient([
            'environment' => \Square\Environment::SANDBOX,
            'accessToken' => 'BAD_TOKEN'
        ]);

        $response = $client->getCustomersApi()->listCustomers();

        $this->assertEquals(401, $response->getStatusCode());
        $this->assertEquals(1, count($response->getErrors()));
        $this->assertEquals("AUTHENTICATION_ERROR", $response->getErrors()[0]->getCategory());
        $this->assertEquals("UNAUTHORIZED", $response->getErrors()[0]->getCode());
        $this->assertEquals("This request could not be authorized.", $response->getErrors()[0]->getDetail());
    }
}