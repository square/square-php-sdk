<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The payment the cardholder disputed.
 */
class DisputedPayment extends JsonSerializableType
{
    /**
     * @var ?string $paymentId Square-generated unique ID of the payment being disputed.
     */
    #[JsonProperty('payment_id')]
    private ?string $paymentId;

    /**
     * @param array{
     *   paymentId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->paymentId = $values['paymentId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * @param ?string $value
     */
    public function setPaymentId(?string $value = null): self
    {
        $this->paymentId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
