<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class PaymentBalanceActivityDepositFeeReversedDetail extends JsonSerializableType
{
    /**
     * @var ?string $payoutId The ID of the payout that triggered this deposit fee activity.
     */
    #[JsonProperty('payout_id')]
    private ?string $payoutId;

    /**
     * @param array{
     *   payoutId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->payoutId = $values['payoutId'] ?? null;
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
