<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the Square processing fee.
 */
class ProcessingFee extends JsonSerializableType
{
    /**
     * @var ?string $effectiveAt The timestamp of when the fee takes effect, in RFC 3339 format.
     */
    #[JsonProperty('effective_at')]
    private ?string $effectiveAt;

    /**
     * @var ?string $type The type of fee assessed or adjusted. The fee type can be `INITIAL` or `ADJUSTMENT`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * The fee amount, which might be negative, that is assessed or adjusted by Square.
     *
     * Positive values represent funds being assessed, while negative values represent
     * funds being returned.
     *
     * @var ?Money $amountMoney
     */
    #[JsonProperty('amount_money')]
    private ?Money $amountMoney;

    /**
     * @param array{
     *   effectiveAt?: ?string,
     *   type?: ?string,
     *   amountMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->effectiveAt = $values['effectiveAt'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->amountMoney = $values['amountMoney'] ?? null;
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
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
