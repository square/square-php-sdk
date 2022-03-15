<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * V1PaymentSurcharge
 */
class V1PaymentSurcharge implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var V1Money|null
     */
    private $appliedMoney;

    /**
     * @var string|null
     */
    private $rate;

    /**
     * @var V1Money|null
     */
    private $amountMoney;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var bool|null
     */
    private $taxable;

    /**
     * @var V1PaymentTax[]|null
     */
    private $taxes;

    /**
     * @var string|null
     */
    private $surchargeId;

    /**
     * Returns Name.
     *
     * The name of the surcharge.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the surcharge.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Applied Money.
     */
    public function getAppliedMoney(): ?V1Money
    {
        return $this->appliedMoney;
    }

    /**
     * Sets Applied Money.
     *
     * @maps applied_money
     */
    public function setAppliedMoney(?V1Money $appliedMoney): void
    {
        $this->appliedMoney = $appliedMoney;
    }

    /**
     * Returns Rate.
     *
     * The amount of the surcharge as a percentage. The percentage is provided as a string representing the
     * decimal equivalent of the percentage. For example, "0.7" corresponds to a 7% surcharge. Exactly one
     * of rate or amount_money should be set.
     */
    public function getRate(): ?string
    {
        return $this->rate;
    }

    /**
     * Sets Rate.
     *
     * The amount of the surcharge as a percentage. The percentage is provided as a string representing the
     * decimal equivalent of the percentage. For example, "0.7" corresponds to a 7% surcharge. Exactly one
     * of rate or amount_money should be set.
     *
     * @maps rate
     */
    public function setRate(?string $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * Returns Amount Money.
     */
    public function getAmountMoney(): ?V1Money
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     *
     * @maps amount_money
     */
    public function setAmountMoney(?V1Money $amountMoney): void
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Taxable.
     *
     * Indicates whether the surcharge is taxable.
     */
    public function getTaxable(): ?bool
    {
        return $this->taxable;
    }

    /**
     * Sets Taxable.
     *
     * Indicates whether the surcharge is taxable.
     *
     * @maps taxable
     */
    public function setTaxable(?bool $taxable): void
    {
        $this->taxable = $taxable;
    }

    /**
     * Returns Taxes.
     *
     * The list of taxes that should be applied to the surcharge.
     *
     * @return V1PaymentTax[]|null
     */
    public function getTaxes(): ?array
    {
        return $this->taxes;
    }

    /**
     * Sets Taxes.
     *
     * The list of taxes that should be applied to the surcharge.
     *
     * @maps taxes
     *
     * @param V1PaymentTax[]|null $taxes
     */
    public function setTaxes(?array $taxes): void
    {
        $this->taxes = $taxes;
    }

    /**
     * Returns Surcharge Id.
     *
     * A Square-issued unique identifier associated with the surcharge.
     */
    public function getSurchargeId(): ?string
    {
        return $this->surchargeId;
    }

    /**
     * Sets Surcharge Id.
     *
     * A Square-issued unique identifier associated with the surcharge.
     *
     * @maps surcharge_id
     */
    public function setSurchargeId(?string $surchargeId): void
    {
        $this->surchargeId = $surchargeId;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->name)) {
            $json['name']          = $this->name;
        }
        if (isset($this->appliedMoney)) {
            $json['applied_money'] = $this->appliedMoney;
        }
        if (isset($this->rate)) {
            $json['rate']          = $this->rate;
        }
        if (isset($this->amountMoney)) {
            $json['amount_money']  = $this->amountMoney;
        }
        if (isset($this->type)) {
            $json['type']          = $this->type;
        }
        if (isset($this->taxable)) {
            $json['taxable']       = $this->taxable;
        }
        if (isset($this->taxes)) {
            $json['taxes']         = $this->taxes;
        }
        if (isset($this->surchargeId)) {
            $json['surcharge_id']  = $this->surchargeId;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
