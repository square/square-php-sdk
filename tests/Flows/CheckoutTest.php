<?php
namespace Square\Tests;

use Square\Exceptions\ApiException;
use Square\Exceptions;
use Square\ApiHelper;
use Square\Apis\LocationsApi;
use Square\Apis\CheckoutApi;
use Square\Models\CreateOrderResponse;
use Square\Models\CreateCheckoutRequest;
use Square\Models\CreateCheckoutResponse;
use Square\Models\Checkout;
use Square\Models\Currency;
use Square\Models\SearchOrdersResponse;
use Square\Models\UpdateOrderResponse;
use Square\Models\BatchRetrieveOrdersResponse;
use Square\Models\PayOrderResponse;
use Square\Models\OrderMoneyAmounts;
use Square\Models\OrderLineItem;
use Square\Models\Order;
use Square\Models\Money;
use Square\Models\OrderState;
use Square\Models\CreateOrderRequest;
use Square\Models;
use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase
{
    /**
     * @var \Square\Apis\CheckoutApi Controller instance
     */
    protected static $controller;

    /**
     * @var \Square\LocationsApi Controller instance
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
        $client = ClientFactory::create(self::$httpResponse);
        self::$controller = $client->getCheckoutApi();
        self::$Locations = $client->getLocationsApi();
    }


    public function testCreateCheckout(){
        // Retrieve Location
        $locationsResult = self::$Locations->listLocations();

        $this->assertTrue($locationsResult->isSuccess());

        $locationId = $locationsResult->getResult()->getLocations()[0]->getId();

        // Create Order Request
        $orderBody_idempotencyKey = uniqid();
        $order = new Order($locationId);

        $amount = 100;
        $quantity = 2;
        $body_order_order_lineItems = [];
        $body_order_order_lineItems[0] = new OrderLineItem($quantity);
        $body_order_order_lineItems[0]->setName("Example Line Item");
        $body_order_order_lineItems[0]->setBasePriceMoney(new Money);
        $body_order_order_lineItems[0]->getBasePriceMoney()->setAmount($amount);
        $body_order_order_lineItems[0]->getBasePriceMoney()->setCurrency(Currency::USD);

        $orderBody = new CreateOrderRequest;
        $orderBody->setIdempotencyKey($orderBody_idempotencyKey);
        $orderBody->setOrder($order);
        $orderBody->getOrder()->setLineItems($body_order_order_lineItems);

        // Create Checkout request
        $checkout_body_idempotencyKey = uniqid();
        $body = new CreateCheckoutRequest(
            $checkout_body_idempotencyKey,
                $orderBody
        );

        
        $apiResponse = self::$controller->createCheckout($locationId, $body);
 
        $this->assertTrue($apiResponse->isSuccess());
        $this->assertTrue($apiResponse->getResult() instanceof CreateCheckoutResponse);
        $this->assertTrue($apiResponse->getResult()->getCheckout() instanceof Checkout);
        $this->assertEquals($apiResponse->getResult()->getCheckout()->getOrder()->getTotalMoney()->getAmount(), $quantity * $amount);
    }
}
