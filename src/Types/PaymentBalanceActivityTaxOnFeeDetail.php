<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class PaymentBalanceActivityTaxOnFeeDetail extends JsonSerializableType
{
    /**
     * @var ?string $paymentId The ID of the payment associated with this activity.
     */
    #[JsonProperty('payment_id')]
    private ?string $paymentId;

    /**
     * @var ?string $taxRateDescription The description of the tax rate being applied. For example: "GST", "HST".
     */
    #[JsonProperty('tax_rate_description')]
    private ?string $taxRateDescription;

    /**
     * @param array{
     *   paymentId?: ?string,
     *   taxRateDescription?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->paymentId = $values['paymentId'] ?? null;
        $this->taxRateDescription = $values['taxRateDescription'] ?? null;
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
     * @return ?string
     */
    public function getTaxRateDescription(): ?string
    {
        return $this->taxRateDescription;
    }

    /**
     * @param ?string $value
     */
    public function setTaxRateDescription(?string $value = null): self
    {
        $this->taxRateDescription = $value;
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
