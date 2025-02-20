<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\SquareClient;
use Square\Terminal\Checkouts\Requests\CancelCheckoutsRequest;
use Square\Terminal\Checkouts\Requests\GetCheckoutsRequest;
use Square\Terminal\Checkouts\Requests\CreateTerminalCheckoutRequest;
use Square\Terminal\Checkouts\Requests\SearchTerminalCheckoutsRequest;
use Square\Types\TerminalCheckout;
use Square\Types\Money;
use Square\Types\DeviceCheckoutOptions;

class TerminalTest extends TestCase
{
    private static SquareClient $client;
    private static string $checkoutId;
    private static string $sandboxDeviceId = 'da40d603-c2ea-4a65-8cfd-f42e36dab0c7';

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();

        // Create terminal checkout for testing
        $checkoutRequest = new CreateTerminalCheckoutRequest([
            'idempotencyKey' => uniqid(),
            'checkout' => new TerminalCheckout([
                'deviceOptions' => new DeviceCheckoutOptions([
                    'deviceId' => self::$sandboxDeviceId,
                ]),
                'amountMoney' => new Money([
                    'amount' => 100,
                    'currency' => 'USD',
                ]),
            ]),
        ]);
        $checkoutResponse = self::$client->terminal->checkouts->create($checkoutRequest);
        $checkoutId = $checkoutResponse->getCheckout()?->getId();
        if($checkoutId === null) {
            throw new RuntimeException('Checkout ID is null.');
        }
        self::$checkoutId = $checkoutId;
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testCreateTerminalCheckout() : void
    {
        $checkoutRequest = new  CreateTerminalCheckoutRequest([
            'idempotencyKey' => uniqid(),
            'checkout' => new TerminalCheckout([
                'deviceOptions' => new DeviceCheckoutOptions([
                    'deviceId' => self::$sandboxDeviceId,
                ]),
                'amountMoney' => new Money([
                    'amount' => 100,
                    'currency' => 'USD',
                ]),
            ]),
        ]);
        $response = self::$client->terminal->checkouts->create($checkoutRequest);

        $this->assertNotNull($response->getCheckout());
        $this->assertEquals(self::$sandboxDeviceId, $response->getCheckout()->getDeviceOptions()->getDeviceId());
        $this->assertEquals(100, $response->getCheckout()->getAmountMoney()->getAmount());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testSearchTerminalCheckouts() : void
    {
        $searchRequest = new SearchTerminalCheckoutsRequest();
        $searchRequest->setLimit(1);
        $response = self::$client->terminal->checkouts->search($searchRequest);

        $this->assertNotNull($response->getCheckouts());
        $this->assertGreaterThan(0, count($response->getCheckouts()));
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testGetTerminalCheckout() : void
    {
        $getRequest = new GetCheckoutsRequest([
            'checkoutId' => self::$checkoutId,
        ]);
        $response = self::$client->terminal->checkouts->get($getRequest);

        $this->assertNotNull($response->getCheckout());
        $this->assertEquals(self::$checkoutId, $response->getCheckout()->getId());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testCancelTerminalCheckout() : void
    {
        $cancelRequest = new CancelCheckoutsRequest([
            'checkoutId' => self::$checkoutId,
        ]);
        $response = self::$client->terminal->checkouts->cancel($cancelRequest);

        $this->assertNotNull($response->getCheckout());
        $this->assertEquals('CANCELED', $response->getCheckout()->getStatus());
    }
}
