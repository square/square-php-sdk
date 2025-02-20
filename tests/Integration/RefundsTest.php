<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\Payments\Requests\CreatePaymentRequest;
use Square\Refunds\Requests\RefundPaymentRequest;
use Square\Refunds\Requests\GetRefundsRequest;
use Square\Refunds\Requests\ListRefundsRequest;
use Square\SquareClient;
use Square\Types\Money;

class RefundsTest extends TestCase
{
    private static SquareClient $client;
    private static string $paymentId;
    private static string $refundId;

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();

        // Create payment for testing refunds
        $paymentRequest = new CreatePaymentRequest([
            'sourceId' => 'cnon:card-nonce-ok',
            'idempotencyKey' => uniqid(),
            'amountMoney' => new Money(['amount' => 200, 'currency' => 'USD']),
            'appFeeMoney' => new Money(['amount' => 10, 'currency' => 'USD']),
            'autocomplete' => true
        ]);
        $paymentResponse = self::$client->payments->create($paymentRequest);
        $payment = $paymentResponse->getPayment();
        if($payment === null) {
            throw new RuntimeException('Payment or Payment ID is null.');
        }
        $paymentId = $payment->getId();
        if($paymentId === null) {
            throw new RuntimeException('Payment ID is null.');
        }
        self::$paymentId = $paymentId;

        // Create initial refund for testing
        $refundRequest = new RefundPaymentRequest([
            'idempotencyKey' => uniqid(),
            'amountMoney' => new Money(['amount' => 200, 'currency' => 'USD']),
            'paymentId' => self::$paymentId
        ]);
        $refundResponse = self::$client->refunds->refundPayment($refundRequest);
        $refund = $refundResponse->getRefund();
        if($refund === null)
        {
            throw new RuntimeException('Refund is null.');
        }

        self::$refundId = $refund->getId();
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testListPaymentRefunds() : void
    {
        $listRequest = new ListRefundsRequest();
        $response = self::$client->refunds->list($listRequest);
        $page = $response->getPages()->current();
        $refunds = $page->getItems();
        $this->assertNotNull($refunds);
        $this->assertGreaterThan(0, count($refunds));
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testRefundPayment() : void
    {
        // Create new payment to refund
        $paymentRequest = new CreatePaymentRequest([
            'sourceId' => 'cnon:card-nonce-ok',
            'idempotencyKey' => uniqid(),
            'amountMoney' => new Money(['amount' => 200, 'currency' => 'USD']),
            'appFeeMoney' => new Money(['amount' => 10, 'currency' => 'USD']),
            'autocomplete' => true
        ]);
        $paymentResponse = self::$client->payments->create($paymentRequest);
        $payment = $paymentResponse->getPayment();
        if($payment === null) {
            throw new RuntimeException('Payment or Payment ID is null.');
        }
        $paymentId = $payment->getId();
        if($paymentId === null) {
            throw new RuntimeException('Payment ID is null.');
        }

        $refundRequest = new RefundPaymentRequest([
            'idempotencyKey' => uniqid(),
            'amountMoney' => new Money(['amount' => 200, 'currency' => 'USD']),
            'paymentId' => $paymentId
        ]);
        $response = self::$client->refunds->refundPayment($refundRequest);

        $this->assertNotNull($response->getRefund());
        $this->assertEquals($paymentId, $response->getRefund()->getPaymentId());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testGetPaymentRefund() : void
    {
        $getRequest = new GetRefundsRequest(['refundId' => self::$refundId]);
        $response = self::$client->refunds->get($getRequest);

        $this->assertNotNull($response->getRefund());
        $this->assertEquals(self::$refundId, $response->getRefund()->getId());
        $this->assertEquals(self::$paymentId, $response->getRefund()->getPaymentId());
    }

    /**
     * @throws SquareException
     */
    public function testHandleInvalidRefundId() : void
    {
        $this->expectException(SquareApiException::class);

        $getRequest = new GetRefundsRequest(['refundId' => 'invalid-id']);
        self::$client->refunds->get($getRequest);
    }
}
