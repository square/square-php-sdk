<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class PaymentCreatedEventObject extends JsonSerializableType
{
    /**
     * @var ?Payment $payment The created payment.
     */
    #[JsonProperty('payment')]
    private ?Payment $payment;

    /**
     * @param array{
     *   payment?: ?Payment,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->payment = $values['payment'] ?? null;
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
    public function __toString(): string
    {
        return $this->toJson();
    }
}
