<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\Orders\Requests\BatchGetOrdersRequest;
use Square\Orders\Requests\CalculateOrderRequest;
use Square\Orders\Requests\PayOrderRequest;
use Square\Orders\Requests\SearchOrdersRequest;
use Square\Orders\Requests\UpdateOrderRequest;
use Square\SquareClient;
use Square\Types\CreateOrderRequest;
use Square\Types\Money;
use Square\Types\Order;
use Square\Types\OrderLineItem;

class OrdersTest extends TestCase
{
    private static SquareClient $client;
    private static string $locationId;
    private static string $orderId;
    private static string $lineItemUid;

    /**
     * @throws SquareException
     */
    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();
        self::$locationId = Helpers::getDefaultLocationId(self::$client);

        // Create initial order for testing
        $orderResponse = self::$client->orders->create(new CreateOrderRequest([
            'idempotencyKey' => uniqid(),
            'order' => new Order([
                'locationId' => self::$locationId,
                'lineItems' => [
                    new OrderLineItem([
                        'name' => 'New Item',
                        'quantity' => '1',
                        'basePriceMoney' => new Money([
                            'amount' => 100,
                            'currency' => 'USD',
                        ]),
                    ]),
                ],
            ]),
        ]));

        $order = $orderResponse->getOrder();
        if ($order === null) {
            throw new RuntimeException('Order is null.');
        }
        $orderId = $order->getId();
        if ($orderId === null) {
            throw new RuntimeException('Order ID is null.');
        }

        self::$orderId = $orderId;

        $lineItems = $order->getLineItems();
        if ($lineItems === null || count($lineItems) === 0) {
            throw new RuntimeException('Line items are null or empty.');
        }
        $lineItemUid = $lineItems[0]->getUid();
        if ($lineItemUid === null) {
            throw new RuntimeException('Line item UID is null.');
        }
        self::$lineItemUid = $lineItemUid;
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testCreateOrder(): void
    {
        $response = self::$client->orders->create(new CreateOrderRequest([
            'idempotencyKey' => uniqid(),
            'order' => new Order([
                'locationId' => self::$locationId,
                'lineItems' => [
                    new OrderLineItem([
                        'name' => 'New Item',
                        'quantity' => '1',
                        'basePriceMoney' => new Money([
                            'amount' => 100,
                            'currency' => 'USD',
                        ]),
                    ]),
                ],
            ]),
        ]));

        $this->assertNotNull($response->getOrder());
        $this->assertEquals(self::$locationId, $response->getOrder()->getLocationId());
        $lineItems = $response->getOrder()->getLineItems();
        $this->assertNotNull($lineItems);
        $this->assertGreaterThan(0, count($lineItems));
        $this->assertEquals('New Item', $lineItems[0]->getName());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testBatchRetrieveOrders(): void
    {
        $response = self::$client->orders->batchGet(new BatchGetOrdersRequest([
            'orderIds' => [self::$orderId],
        ]));

        $this->assertNotNull($response->getOrders());
        $this->assertEquals(self::$orderId, $response->getOrders()[0]->getId());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testSearchOrders(): void
    {
        $response = self::$client->orders->search(new SearchOrdersRequest([
            'limit' => 1,
            'locationIds' => [self::$locationId],
        ]));

        $this->assertNotNull($response->getOrders());
        $this->assertGreaterThan(0, count($response->getOrders()));
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testUpdateOrder(): void
    {
        $response = self::$client->orders->update(new UpdateOrderRequest([
            'orderId' => self::$orderId,
            'idempotencyKey' => uniqid(),
            'order' => new Order([
                'version' => 1,
                'locationId' => self::$locationId,
                'lineItems' => [
                    new OrderLineItem([
                        'name' => 'Updated Item',
                        'quantity' => '1',
                        'basePriceMoney' => new Money([
                            'amount' => 0,
                            'currency' => 'USD',
                        ]),
                        'note' => null,
                    ]),
                ],
            ]),
            'fieldsToClear' => ["line_items[" . self::$lineItemUid . "]"],
        ]));

        $this->assertNotNull($response->getOrder());
        $this->assertEquals(self::$orderId, $response->getOrder()->getId());
        $lineItems = $response->getOrder()->getLineItems();
        $this->assertNotNull($lineItems);
        $this->assertGreaterThan(0, count($lineItems));
        $this->assertEquals('Updated Item', $lineItems[0]->getName());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testPayOrder(): void
    {
        $response = self::$client->orders->pay(new PayOrderRequest([
            'orderId' => self::$orderId,
            'idempotencyKey' => uniqid(),
            'orderVersion' => 2,
            'paymentIds' => [],
        ]));

        $this->assertNotNull($response->getOrder());
        $this->assertEquals(self::$orderId, $response->getOrder()->getId());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testCalculateOrder(): void
    {
        $response = self::$client->orders->calculate(new CalculateOrderRequest([
            'order' => new Order([
                'locationId' => self::$locationId,
                'lineItems' => [
                    new OrderLineItem([
                        'name' => 'New Item',
                        'quantity' => '1',
                        'basePriceMoney' => new Money([
                            'amount' => 100,
                            'currency' => 'USD',
                        ]),
                    ]),
                ],
            ]),
        ]));

        $this->assertNotNull($response->getOrder());
        $this->assertNotNull($response->getOrder()->getTotalMoney());
    }
}
