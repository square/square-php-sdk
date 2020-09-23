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

        $errorDetail= 'The `Authorization` http header of your request was malformed. The header value is expected to be of the format "Bearer TOKEN" (without quotation marks), where TOKEN is to be replaced with your access token (e.g. "Bearer ABC123def456GHI789jkl0"). For more information, see https://docs.connect.squareup.com/api/connect/v2/#requestandresponseheaders. If you are seeing this error message while using one of our officially supported SDKs, please report this to developers@squareup.com.';
        $response = $client->getPaymentsApi()->listPayments();

        $this->assertEquals(401, $response->getStatusCode());
        $this->assertEquals(1, count($response->getErrors()));
        $this->assertEquals("AUTHENTICATION_ERROR", $response->getErrors()[0]->getCategory());
        $this->assertEquals("UNAUTHORIZED", $response->getErrors()[0]->getCode());
        $this->assertEquals($errorDetail, $response->getErrors()[0]->getDetail());
    }
}