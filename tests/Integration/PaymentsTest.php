<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\Payments\Requests\CancelPaymentByIdempotencyKeyRequest;
use Square\Payments\Requests\CompletePaymentRequest;
use Square\Payments\Requests\CreatePaymentRequest;
use Square\Payments\Requests\CancelPaymentsRequest;
use Square\Payments\Requests\GetPaymentsRequest;
use Square\Payments\Requests\ListPaymentsRequest;
use Square\SquareClient;
use Square\Types\Money;

class PaymentsTest extends TestCase
{
    private static SquareClient $client;
    private static string $paymentId;

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();
        // Create initial payment for testing
        $paymentRequest = new CreatePaymentRequest([
            'sourceId' => 'cnon:card-nonce-ok',
            'idempotencyKey' => uniqid(),
            'amountMoney' => new Money(['amount' => 200, 'currency' => 'USD']),
            'appFeeMoney' => new Money(['amount' => 10, 'currency' => 'USD']),
            'autocomplete' => false,
        ]);
        $paymentResponse = self::$client->payments->create($paymentRequest);
        $payment = $paymentResponse->getPayment();
        if ($payment === null) {
            throw new RuntimeException('Payment ID is null.');
        }
        $paymentId = $payment->getId();
        if ($paymentId === null) {
            throw new RuntimeException('Payment ID is null.');
        }
        self::$paymentId = $paymentId;
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testListPayments(): void
    {
        $listRequest = new ListPaymentsRequest();
        $response = self::$client->payments->list($listRequest);
        $page = $response->getPages()->current();
        $payments = $page->getItems();
        $this->assertNotNull($payments);
        $this->assertGreaterThan(0, count($payments));
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testCreatePayment(): void
    {
        $paymentRequest = new CreatePaymentRequest([
            'sourceId' => 'cnon:card-nonce-ok',
            'idempotencyKey' => uniqid(),
            'amountMoney' => new Money(['amount' => 200, 'currency' => 'USD']),
            'appFeeMoney' => new Money(['amount' => 10, 'currency' => 'USD']),
            'autocomplete' => true,
        ]);
        $response = self::$client->payments->create($paymentRequest);

        $this->assertNotNull($response->getPayment());
        $this->assertNotNull($response->getPayment()->getAppFeeMoney());
        $this->assertEquals(10, $response->getPayment()->getAppFeeMoney()->getAmount());
        $this->assertEquals('USD', $response->getPayment()->getAppFeeMoney()->getCurrency());
        $this->assertNotNull($response->getPayment()->getAmountMoney());
        $this->assertEquals(200, $response->getPayment()->getAmountMoney()->getAmount());
        $this->assertEquals('USD', $response->getPayment()->getAmountMoney()->getCurrency());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testGetPayment(): void
    {
        $getRequest = new GetPaymentsRequest(['paymentId' => self::$paymentId]);
        $response = self::$client->payments->get($getRequest);

        $this->assertNotNull($response->getPayment());
        $this->assertEquals(self::$paymentId, $response->getPayment()->getId());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testCancelPayment(): void
    {
        $cancelRequest = new CancelPaymentsRequest(['paymentId' => self::$paymentId]);
        $response = self::$client->payments->cancel($cancelRequest);

        $this->assertNotNull($response->getPayment());
        $this->assertEquals(self::$paymentId, $response->getPayment()->getId());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testCancelPaymentByIdempotencyKey(): void
    {
        $idempotencyKey = uniqid();

        // Create payment to cancel
        $paymentRequest = new CreatePaymentRequest([
            'sourceId' => 'cnon:card-nonce-ok',
            'idempotencyKey' => $idempotencyKey,
            'amountMoney' => new Money(['amount' => 200, 'currency' => 'USD']),
            'appFeeMoney' => new Money(['amount' => 10, 'currency' => 'USD']),
            'autocomplete' => false,
        ]);
        self::$client->payments->create($paymentRequest);

        // Cancel by idempotency key
        $cancelRequest = new CancelPaymentByIdempotencyKeyRequest(['idempotencyKey' => $idempotencyKey]);
        $response = self::$client->payments->cancelByIdempotencyKey($cancelRequest);

        $this->assertNotNull($response);
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testCompletePayment(): void
    {
        // Create payment to complete
        $paymentRequest = new CreatePaymentRequest([
            'sourceId' => 'cnon:card-nonce-ok',
            'idempotencyKey' => uniqid(),
            'amountMoney' => new Money(['amount' => 200, 'currency' => 'USD']),
            'appFeeMoney' => new Money(['amount' => 10, 'currency' => 'USD']),
            'autocomplete' => false,
        ]);
        $createResponse = self::$client->payments->create($paymentRequest);

        $payment = $createResponse->getPayment();
        if ($payment === null) {
            throw new RuntimeException('Payment ID is null.');
        }
        $paymentId = $payment->getId();
        if ($paymentId === null) {
            throw new RuntimeException('Payment ID is null.');
        }

        $completeRequest = new CompletePaymentRequest(['paymentId' => $paymentId]);
        $response = self::$client->payments->complete($completeRequest);

        $this->assertNotNull($response->getPayment());
        $this->assertEquals('COMPLETED', $response->getPayment()->getStatus());
    }
}
