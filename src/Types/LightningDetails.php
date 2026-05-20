<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Additional details about `WALLET` type payments with the `brand` of `LIGHTNING`.
 */
class LightningDetails extends JsonSerializableType
{
    /**
     * @var ?string $paymentUrl Payment URL for the lightning payment, a.k.a. the invoice.
     */
    #[JsonProperty('payment_url')]
    private ?string $paymentUrl;

    /**
     * @param array{
     *   paymentUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->paymentUrl = $values['paymentUrl'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getPaymentUrl(): ?string
    {
        return $this->paymentUrl;
    }

    /**
     * @param ?string $value
     */
    public function setPaymentUrl(?string $value = null): self
    {
        $this->paymentUrl = $value;
        $this->_setField('paymentUrl');
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
