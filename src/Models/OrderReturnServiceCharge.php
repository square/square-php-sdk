<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents the service charge applied to the original order.
 */
class OrderReturnServiceCharge implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string|null
     */
    private $sourceServiceChargeUid;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $catalogObjectId;

    /**
     * @var string|null
     */
    private $percentage;

    /**
     * @var Money|null
     */
    private $amountMoney;

    /**
     * @var Money|null
     */
    private $appliedMoney;

    /**
     * @var Money|null
     */
    private $totalMoney;

    /**
     * @var Money|null
     */
    private $totalTaxMoney;

    /**
     * @var string|null
     */
    private $calculationPhase;

    /**
     * @var bool|null
     */
    private $taxable;

    /**
     * @var OrderLineItemAppliedTax[]|null
     */
    private $appliedTaxes;

    /**
     * Returns Uid.
     *
     * Unique ID that identifies the return service charge only within this order.
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * Unique ID that identifies the return service charge only within this order.
     *
     * @maps uid
     */
    public function setUid(?string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * Returns Source Service Charge Uid.
     *
     * `uid` of the Service Charge from the Order containing the original
     * charge of the service charge. `source_service_charge_uid` is `null` for
     * unlinked returns.
     */
    public function getSourceServiceChargeUid(): ?string
    {
        return $this->sourceServiceChargeUid;
    }

    /**
     * Sets Source Service Charge Uid.
     *
     * `uid` of the Service Charge from the Order containing the original
     * charge of the service charge. `source_service_charge_uid` is `null` for
     * unlinked returns.
     *
     * @maps source_service_charge_uid
     */
    public function setSourceServiceChargeUid(?string $sourceServiceChargeUid): void
    {
        $this->sourceServiceChargeUid = $sourceServiceChargeUid;
    }

    /**
     * Returns Name.
     *
     * The name of the service charge.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the service charge.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Catalog Object Id.
     *
     * The catalog object ID of the associated [CatalogServiceCharge](#type-catalogservicecharge).
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The catalog object ID of the associated [CatalogServiceCharge](#type-catalogservicecharge).
     *
     * @maps catalog_object_id
     */
    public function setCatalogObjectId(?string $catalogObjectId): void
    {
        $this->catalogObjectId = $catalogObjectId;
    }

    /**
     * Returns Percentage.
     *
     * The percentage of the service charge, as a string representation of
     * a decimal number. For example, a value of `"7.25"` corresponds to a
     * percentage of 7.25%.
     *
     * Exactly one of `percentage` or `amount_money` should be set.
     */
    public function getPercentage(): ?string
    {
        return $this->percentage;
    }

    /**
     * Sets Percentage.
     *
     * The percentage of the service charge, as a string representation of
     * a decimal number. For example, a value of `"7.25"` corresponds to a
     * percentage of 7.25%.
     *
     * Exactly one of `percentage` or `amount_money` should be set.
     *
     * @maps percentage
     */
    public function setPercentage(?string $percentage): void
    {
        $this->percentage = $percentage;
    }

    /**
     * Returns Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAmountMoney(): ?Money
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps amount_money
     */
    public function setAmountMoney(?Money $amountMoney): void
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Applied Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAppliedMoney(): ?Money
    {
        return $this->appliedMoney;
    }

    /**
     * Sets Applied Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps applied_money
     */
    public function setAppliedMoney(?Money $appliedMoney): void
    {
        $this->appliedMoney = $appliedMoney;
    }

    /**
     * Returns Total Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalMoney(): ?Money
    {
        return $this->totalMoney;
    }

    /**
     * Sets Total Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_money
     */
    public function setTotalMoney(?Money $totalMoney): void
    {
        $this->totalMoney = $totalMoney;
    }

    /**
     * Returns Total Tax Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalTaxMoney(): ?Money
    {
        return $this->totalTaxMoney;
    }

    /**
     * Sets Total Tax Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_tax_money
     */
    public function setTotalTaxMoney(?Money $totalTaxMoney): void
    {
        $this->totalTaxMoney = $totalTaxMoney;
    }

    /**
     * Returns Calculation Phase.
     *
     * Represents a phase in the process of calculating order totals.
     * Service charges are applied __after__ the indicated phase.
     *
     * [Read more about how order totals are calculated.](https://developer.squareup.com/docs/orders-
     * api/how-it-works#how-totals-are-calculated)
     */
    public function getCalculationPhase(): ?string
    {
        return $this->calculationPhase;
    }

    /**
     * Sets Calculation Phase.
     *
     * Represents a phase in the process of calculating order totals.
     * Service charges are applied __after__ the indicated phase.
     *
     * [Read more about how order totals are calculated.](https://developer.squareup.com/docs/orders-
     * api/how-it-works#how-totals-are-calculated)
     *
     * @maps calculation_phase
     */
    public function setCalculationPhase(?string $calculationPhase): void
    {
        $this->calculationPhase = $calculationPhase;
    }

    /**
     * Returns Taxable.
     *
     * Indicates whether the surcharge can be taxed. Service charges
     * calculated in the `TOTAL_PHASE` cannot be marked as taxable.
     */
    public function getTaxable(): ?bool
    {
        return $this->taxable;
    }

    /**
     * Sets Taxable.
     *
     * Indicates whether the surcharge can be taxed. Service charges
     * calculated in the `TOTAL_PHASE` cannot be marked as taxable.
     *
     * @maps taxable
     */
    public function setTaxable(?bool $taxable): void
    {
        $this->taxable = $taxable;
    }

    /**
     * Returns Applied Taxes.
     *
     * The list of references to `OrderReturnTax` entities applied to the
     * `OrderReturnServiceCharge`. Each `OrderLineItemAppliedTax` has a `tax_uid`
     * that references the `uid` of a top-level `OrderReturnTax` that is being
     * applied to the `OrderReturnServiceCharge`. On reads, the amount applied is
     * populated.
     *
     * @return OrderLineItemAppliedTax[]|null
     */
    public function getAppliedTaxes(): ?array
    {
        return $this->appliedTaxes;
    }

    /**
     * Sets Applied Taxes.
     *
     * The list of references to `OrderReturnTax` entities applied to the
     * `OrderReturnServiceCharge`. Each `OrderLineItemAppliedTax` has a `tax_uid`
     * that references the `uid` of a top-level `OrderReturnTax` that is being
     * applied to the `OrderReturnServiceCharge`. On reads, the amount applied is
     * populated.
     *
     * @maps applied_taxes
     *
     * @param OrderLineItemAppliedTax[]|null $appliedTaxes
     */
    public function setAppliedTaxes(?array $appliedTaxes): void
    {
        $this->appliedTaxes = $appliedTaxes;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['uid']                    = $this->uid;
        $json['source_service_charge_uid'] = $this->sourceServiceChargeUid;
        $json['name']                   = $this->name;
        $json['catalog_object_id']      = $this->catalogObjectId;
        $json['percentage']             = $this->percentage;
        $json['amount_money']           = $this->amountMoney;
        $json['applied_money']          = $this->appliedMoney;
        $json['total_money']            = $this->totalMoney;
        $json['total_tax_money']        = $this->totalTaxMoney;
        $json['calculation_phase']      = $this->calculationPhase;
        $json['taxable']                = $this->taxable;
        $json['applied_taxes']          = $this->appliedTaxes;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
