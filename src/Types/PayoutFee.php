<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a payout fee that can incur as part of a payout.
 */
class PayoutFee extends JsonSerializableType
{
    /**
     * @var ?Money $amountMoney The money amount of the payout fee.
     */
    #[JsonProperty('amount_money')]
    private ?Money $amountMoney;

    /**
     * @var ?string $effectiveAt The timestamp of when the fee takes effect, in RFC 3339 format.
     */
    #[JsonProperty('effective_at')]
    private ?string $effectiveAt;

    /**
     * The type of fee assessed as part of the payout.
     * See [PayoutFeeType](#type-payoutfeetype) for possible values
     *
     * @var ?value-of<PayoutFeeType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @param array{
     *   amountMoney?: ?Money,
     *   effectiveAt?: ?string,
     *   type?: ?value-of<PayoutFeeType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amountMoney = $values['amountMoney'] ?? null;
        $this->effectiveAt = $values['effectiveAt'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return ?Money
     */
    public function getAmountMoney(): ?Money
    {
        return $this->amountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setAmountMoney(?Money $value = null): self
    {
        $this->amountMoney = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEffectiveAt(): ?string
    {
        return $this->effectiveAt;
    }

    /**
     * @param ?string $value
     */
    public function setEffectiveAt(?string $value = null): self
    {
        $this->effectiveAt = $value;
        return $this;
    }

    /**
     * @return ?value-of<PayoutFeeType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<PayoutFeeType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
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
