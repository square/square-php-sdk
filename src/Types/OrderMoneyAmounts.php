<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A collection of various money amounts.
 */
class OrderMoneyAmounts extends JsonSerializableType
{
    /**
     * @var ?Money $totalMoney The total money.
     */
    #[JsonProperty('total_money')]
    private ?Money $totalMoney;

    /**
     * @var ?Money $taxMoney The money associated with taxes.
     */
    #[JsonProperty('tax_money')]
    private ?Money $taxMoney;

    /**
     * @var ?Money $discountMoney The money associated with discounts.
     */
    #[JsonProperty('discount_money')]
    private ?Money $discountMoney;

    /**
     * @var ?Money $tipMoney The money associated with tips.
     */
    #[JsonProperty('tip_money')]
    private ?Money $tipMoney;

    /**
     * @var ?Money $serviceChargeMoney The money associated with service charges.
     */
    #[JsonProperty('service_charge_money')]
    private ?Money $serviceChargeMoney;

    /**
     * @param array{
     *   totalMoney?: ?Money,
     *   taxMoney?: ?Money,
     *   discountMoney?: ?Money,
     *   tipMoney?: ?Money,
     *   serviceChargeMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->totalMoney = $values['totalMoney'] ?? null;
        $this->taxMoney = $values['taxMoney'] ?? null;
        $this->discountMoney = $values['discountMoney'] ?? null;
        $this->tipMoney = $values['tipMoney'] ?? null;
        $this->serviceChargeMoney = $values['serviceChargeMoney'] ?? null;
    }

    /**
     * @return ?Money
     */
    public function getTotalMoney(): ?Money
    {
        return $this->totalMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTotalMoney(?Money $value = null): self
    {
        $this->totalMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getTaxMoney(): ?Money
    {
        return $this->taxMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTaxMoney(?Money $value = null): self
    {
        $this->taxMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getDiscountMoney(): ?Money
    {
        return $this->discountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setDiscountMoney(?Money $value = null): self
    {
        $this->discountMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getTipMoney(): ?Money
    {
        return $this->tipMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTipMoney(?Money $value = null): self
    {
        $this->tipMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getServiceChargeMoney(): ?Money
    {
        return $this->serviceChargeMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setServiceChargeMoney(?Money $value = null): self
    {
        $this->serviceChargeMoney = $value;
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
