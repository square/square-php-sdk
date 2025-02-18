<?php

namespace Square\Orders\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class PayOrderRequest extends JsonSerializableType
{
    /**
     * @var string $orderId The ID of the order being paid.
     */
    private string $orderId;

    /**
     * A value you specify that uniquely identifies this request among requests you have sent. If
     * you are unsure whether a particular payment request was completed successfully, you can reattempt
     * it with the same idempotency key without worrying about duplicate payments.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency).
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @var ?int $orderVersion The version of the order being paid. If not supplied, the latest version will be paid.
     */
    #[JsonProperty('order_version')]
    private ?int $orderVersion;

    /**
     * The IDs of the [payments](entity:Payment) to collect.
     * The payment total must match the order total.
     *
     * @var ?array<string> $paymentIds
     */
    #[JsonProperty('payment_ids'), ArrayType(['string'])]
    private ?array $paymentIds;

    /**
     * @param array{
     *   orderId: string,
     *   idempotencyKey: string,
     *   orderVersion?: ?int,
     *   paymentIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->orderId = $values['orderId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->orderVersion = $values['orderVersion'] ?? null;
        $this->paymentIds = $values['paymentIds'] ?? null;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $value
     */
    public function setOrderId(string $value): self
    {
        $this->orderId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getOrderVersion(): ?int
    {
        return $this->orderVersion;
    }

    /**
     * @param ?int $value
     */
    public function setOrderVersion(?int $value = null): self
    {
        $this->orderVersion = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getPaymentIds(): ?array
    {
        return $this->paymentIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setPaymentIds(?array $value = null): self
    {
        $this->paymentIds = $value;
        return $this;
    }
}
