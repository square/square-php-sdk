<?php

namespace Square\Tests;

use Square\APIException;
use Square\Exceptions;
use Square\APIHelper;
use Square\Apis\CustomersApi;
use Square\Models\UpdateCustomerRequest;
use Square\Models\Address;
use Square\Models\CreateCustomerRequest;

use PHPUnit\Framework\TestCase;

class CustomersTest extends TestCase
{

    /**
     * @var \Square\Apis\CustomersApi Controller instance
     */
    protected static $controller;

    /**
     * @var \Square\CustomersApi Controller instance
     */
    protected static $Locations;

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
        self::$controller = ClientFactory::create(self::$httpResponse)->getCustomersApi();
    }

    public function testCreateCustomer()
    {
        $phone_number = "1-212-555-4240";

        $postal_code = "10003";

        // Create customer
        $request = new CreateCustomerRequest;
        $request->setGivenName('Amelia');
        $request->setFamilyName('Earhart');
        $request->setPhoneNumber($phone_number);
        $request->setNote('a customer');

        $address = new Address;
        $address->setAddressLine1("500 Electric Ave");
        $address->setAddressLine2("Suite 600");
        $address->setLocality("New York");
        $address->setAdministrativeDistrictLevel1("NY");
        $address->setPostalCode($postal_code);
        $address->setCountry("US");

        $request->setAddress($address);

        $response = self::$controller->createCustomer($request);
        $data = $response->getResult()->getCustomer();

        $this->assertEquals($data->getPhoneNumber(), $phone_number);
        $this->assertEquals($data->getAddress()->getPostalCode(), $postal_code);
        $this->assertEquals($response->getStatusCode(), 200);
        $this->assertTrue($response->isSuccess());
        $this->assertFalse($response->isError());

        return $data;
    }

    /**
     * @depends testCreateCustomer
     */
    public function testGetCustomer($prevData)
    {
        // Retrieve customer
        $customer_id = $prevData->getId();
        $response = self::$controller->retrieveCustomer($customer_id);
        $data = $response->getResult()->getCustomer(); 

        $this->assertTrue($response->isSuccess());
        $this->assertEquals($response->getStatusCode(), 200);
        $this->assertEquals($data->getPhoneNumber(),$prevData->getPhoneNumber());
        $this->assertEquals($data->getAddress()->getPostalCode(),$prevData->getAddress()->getPostalCode());

        return $data;
    }

    /**
     * @depends testGetCustomer
     */
    public function testUpdateCustomer($prevData)
    {
        $phone_number2 = "1-917-500-1000";
        $postal_code2 = "98100";
        $customer_id = $prevData->getId();

        // Update customer
        $updateRequest = new UpdateCustomerRequest;
        $updateRequest->setGivenName($prevData->getGivenName());
        $updateRequest->setFamilyName($prevData->getFamilyName());
        $updateRequest->setCompanyName($prevData->getCompanyName());
        $updateRequest->setNickname($prevData->getNickname());
        $updateRequest->setEmailAddress($prevData->getEmailAddress());
        $updateRequest->setAddress($prevData->getAddress());
        $updateRequest->setPhoneNumber($prevData->getPhoneNumber());
        $updateRequest->setReferenceId($prevData->getReferenceId());
        $updateRequest->setNote($prevData->getNote());
        $updateRequest->setBirthday($prevData->getBirthday());
        $updateRequest->setPhoneNumber($phone_number2);
        $updateRequest->getAddress()->setPostalCode($postal_code2);

        $response = self::$controller->updateCustomer($customer_id, $updateRequest);
        $data = $response->getResult()->getCustomer();

        $this->assertTrue($response->isSuccess());
        $this->assertEquals($data->getPhoneNumber(), $phone_number2);
        $this->assertEquals($data->getAddress()->getPostalCode(), $postal_code2);
        $this->assertEquals($response->getStatusCode(), 200);

        return $customer_id;
    }

    /**
     * @depends testUpdateCustomer
     */
    public function testDelete($customer_id)
    {
        // Delete customer
        $response = self::$controller->deleteCustomer($customer_id);
        $this->assertEquals($response->getStatusCode(), 200);
    }
}
