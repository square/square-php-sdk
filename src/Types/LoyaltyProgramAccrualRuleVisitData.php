<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents additional data for rules with the `VISIT` accrual type.
 */
class LoyaltyProgramAccrualRuleVisitData extends JsonSerializableType
{
    /**
     * @var ?Money $minimumAmountMoney The minimum purchase required during the visit to quality for points.
     */
    #[JsonProperty('minimum_amount_money')]
    private ?Money $minimumAmountMoney;

    /**
     * Indicates how taxes should be treated when calculating the purchase amount to determine whether the visit qualifies for points.
     * This setting applies only if `minimum_amount_money` is specified.
     * See [LoyaltyProgramAccrualRuleTaxMode](#type-loyaltyprogramaccrualruletaxmode) for possible values
     *
     * @var value-of<LoyaltyProgramAccrualRuleTaxMode> $taxMode
     */
    #[JsonProperty('tax_mode')]
    private string $taxMode;

    /**
     * @param array{
     *   taxMode: value-of<LoyaltyProgramAccrualRuleTaxMode>,
     *   minimumAmountMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->minimumAmountMoney = $values['minimumAmountMoney'] ?? null;
        $this->taxMode = $values['taxMode'];
    }

    /**
     * @return ?Money
     */
    public function getMinimumAmountMoney(): ?Money
    {
        return $this->minimumAmountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setMinimumAmountMoney(?Money $value = null): self
    {
        $this->minimumAmountMoney = $value;
        return $this;
    }

    /**
     * @return value-of<LoyaltyProgramAccrualRuleTaxMode>
     */
    public function getTaxMode(): string
    {
        return $this->taxMode;
    }

    /**
     * @param value-of<LoyaltyProgramAccrualRuleTaxMode> $value
     */
    public function setTaxMode(string $value): self
    {
        $this->taxMode = $value;
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
