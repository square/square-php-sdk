<?php

namespace Square\Tests;

use Square\APIException;
use Square\APIHelper;
use Square\Exceptions;
use Square\Apis\DisputesApi;
use Square\Utils\FileWrapper;
use Square\Models\ListDisputesResponse;

use PHPUnit\Framework\TestCase;

class DisputesTest extends TestCase
{

    /**
     * @var \Square\Apis\DisputesApi Controller instance
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
        $config = ClientFactory::create();
        self::$httpResponse = new HttpCallBackCatcher();
        self::$controller = new DisputesApi($config, self::$httpResponse);
    }

    public function testListDisputes() 
    {
        $apiResponse = self::$controller->listDisputes();

        $this->assertTrue($apiResponse->isSuccess());
        $this->assertTrue($apiResponse->getResult() instanceof ListDisputesResponse);
    }
}