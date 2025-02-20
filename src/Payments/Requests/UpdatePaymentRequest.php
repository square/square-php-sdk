<?php

namespace Square\Payments\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Payment;
use Square\Core\Json\JsonProperty;

class UpdatePaymentRequest extends JsonSerializableType
{
    /**
     * @var string $paymentId The ID of the payment to update.
     */
    private string $paymentId;

    /**
     * @var ?Payment $payment The updated `Payment` object.
     */
    #[JsonProperty('payment')]
    private ?Payment $payment;

    /**
     * A unique string that identifies this `UpdatePayment` request. Keys can be any valid string
     * but must be unique for every `UpdatePayment` request.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @param array{
     *   paymentId: string,
     *   idempotencyKey: string,
     *   payment?: ?Payment,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->paymentId = $values['paymentId'];
        $this->payment = $values['payment'] ?? null;
        $this->idempotencyKey = $values['idempotencyKey'];
    }

    /**
     * @return string
     */
    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    /**
     * @param string $value
     */
    public function setPaymentId(string $value): self
    {
        $this->paymentId = $value;
        return $this;
    }

    /**
     * @return ?Payment
     */
    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    /**
     * @param ?Payment $value
     */
    public function setPayment(?Payment $value = null): self
    {
        $this->payment = $value;
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
}
