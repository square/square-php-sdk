<?php

namespace Square\Tests;

use Square\APIException;
use Square\APIHelper;
use Square\Exceptions;
use Square\Models\Employee;
use Square\Models\RetrieveEmployeeResponse;
use Square\Models\ListEmployeesResponse;
use Square\Apis\EmployeesApi;

use PHPUnit\Framework\TestCase;

class EmployeesTest extends TestCase
{

    /**
     * @var \Square\Apis\EmployeesApi Controller instance
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
        self::$controller = new EmployeesApi($config, self::$httpResponse);
    }

    public function testListEmployees() 
    {
        $apiResponse = self::$controller->listEmployees();

        $this->assertEquals($apiResponse->getStatusCode(), 200);
        $this->assertTrue($apiResponse->isSuccess());
        $this->assertFalse($apiResponse->isError());
        $this->assertTrue($apiResponse->getResult() instanceof ListEmployeesResponse);

        return $apiResponse->getResult()->getEmployees()[0]->getId();
    }

    /**
     * @depends testListEmployees
     */
    public function testRetrieveEmployee($employeeId) 
    {
        $apiResponse = self::$controller->retrieveEmployee($employeeId);

        $this->assertEquals($apiResponse->getStatusCode(), 200);
        $this->assertTrue($apiResponse->isSuccess());
        $this->assertFalse($apiResponse->isError());
        $this->assertTrue($apiResponse->getResult() instanceof RetrieveEmployeeResponse);
        $this->assertTrue($apiResponse->getResult()->getEmployee() instanceof Employee);
        $this->assertEquals($apiResponse->getResult()->getEmployee()->getId(), $employeeId);
    }
   
}