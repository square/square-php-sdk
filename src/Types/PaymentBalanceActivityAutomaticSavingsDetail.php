<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class PaymentBalanceActivityAutomaticSavingsDetail extends JsonSerializableType
{
    /**
     * @var ?string $paymentId The ID of the payment associated with this activity.
     */
    #[JsonProperty('payment_id')]
    private ?string $paymentId;

    /**
     * @var ?string $payoutId The ID of the payout associated with this activity.
     */
    #[JsonProperty('payout_id')]
    private ?string $payoutId;

    /**
     * @param array{
     *   paymentId?: ?string,
     *   payoutId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->paymentId = $values['paymentId'] ?? null;
        $this->payoutId = $values['payoutId'] ?? null;
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
    public function getPayoutId(): ?string
    {
        return $this->payoutId;
    }

    /**
     * @param ?string $value
     */
    public function setPayoutId(?string $value = null): self
    {
        $this->payoutId = $value;
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
