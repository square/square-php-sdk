<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents the service charge applied to the original order.
 */
class OrderReturnServiceCharge extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID that identifies the return service charge only within this order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * The service charge `uid` from the order containing the original
     * service charge. `source_service_charge_uid` is `null` for
     * unlinked returns.
     *
     * @var ?string $sourceServiceChargeUid
     */
    #[JsonProperty('source_service_charge_uid')]
    private ?string $sourceServiceChargeUid;

    /**
     * @var ?string $name The name of the service charge.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $catalogObjectId The catalog object ID of the associated [OrderServiceCharge](entity:OrderServiceCharge).
     */
    #[JsonProperty('catalog_object_id')]
    private ?string $catalogObjectId;

    /**
     * @var ?int $catalogVersion The version of the catalog object that this service charge references.
     */
    #[JsonProperty('catalog_version')]
    private ?int $catalogVersion;

    /**
     * The percentage of the service charge, as a string representation of
     * a decimal number. For example, a value of `"7.25"` corresponds to a
     * percentage of 7.25%.
     *
     * Either `percentage` or `amount_money` should be set, but not both.
     *
     * @var ?string $percentage
     */
    #[JsonProperty('percentage')]
    private ?string $percentage;

    /**
     * The amount of a non-percentage-based service charge.
     *
     * Either `percentage` or `amount_money` should be set, but not both.
     *
     * @var ?Money $amountMoney
     */
    #[JsonProperty('amount_money')]
    private ?Money $amountMoney;

    /**
     * The amount of money applied to the order by the service charge, including
     * any inclusive tax amounts, as calculated by Square.
     *
     * - For fixed-amount service charges, `applied_money` is equal to `amount_money`.
     * - For percentage-based service charges, `applied_money` is the money calculated using the percentage.
     *
     * @var ?Money $appliedMoney
     */
    #[JsonProperty('applied_money')]
    private ?Money $appliedMoney;

    /**
     * The total amount of money to collect for the service charge.
     *
     * __NOTE__: If an inclusive tax is applied to the service charge, `total_money`
     * does not equal `applied_money` plus `total_tax_money` because the inclusive
     * tax amount is already included in both `applied_money` and `total_tax_money`.
     *
     * @var ?Money $totalMoney
     */
    #[JsonProperty('total_money')]
    private ?Money $totalMoney;

    /**
     * @var ?Money $totalTaxMoney The total amount of tax money to collect for the service charge.
     */
    #[JsonProperty('total_tax_money')]
    private ?Money $totalTaxMoney;

    /**
     * The calculation phase after which to apply the service charge.
     * See [OrderServiceChargeCalculationPhase](#type-orderservicechargecalculationphase) for possible values
     *
     * @var ?value-of<OrderServiceChargeCalculationPhase> $calculationPhase
     */
    #[JsonProperty('calculation_phase')]
    private ?string $calculationPhase;

    /**
     * Indicates whether the surcharge can be taxed. Service charges
     * calculated in the `TOTAL_PHASE` cannot be marked as taxable.
     *
     * @var ?bool $taxable
     */
    #[JsonProperty('taxable')]
    private ?bool $taxable;

    /**
     * The list of references to `OrderReturnTax` entities applied to the
     * `OrderReturnServiceCharge`. Each `OrderLineItemAppliedTax` has a `tax_uid`
     * that references the `uid` of a top-level `OrderReturnTax` that is being
     * applied to the `OrderReturnServiceCharge`. On reads, the applied amount is
     * populated.
     *
     * @var ?array<OrderLineItemAppliedTax> $appliedTaxes
     */
    #[JsonProperty('applied_taxes'), ArrayType([OrderLineItemAppliedTax::class])]
    private ?array $appliedTaxes;

    /**
     * The treatment type of the service charge.
     * See [OrderServiceChargeTreatmentType](#type-orderservicechargetreatmenttype) for possible values
     *
     * @var ?value-of<OrderServiceChargeTreatmentType> $treatmentType
     */
    #[JsonProperty('treatment_type')]
    private ?string $treatmentType;

    /**
     * Indicates the level at which the apportioned service charge applies. For `ORDER`
     * scoped service charges, Square generates references in `applied_service_charges` on
     * all order line items that do not have them. For `LINE_ITEM` scoped service charges,
     * the service charge only applies to line items with a service charge reference in their
     * `applied_service_charges` field.
     *
     * This field is immutable. To change the scope of an apportioned service charge, you must delete
     * the apportioned service charge and re-add it as a new apportioned service charge.
     * See [OrderServiceChargeScope](#type-orderservicechargescope) for possible values
     *
     * @var ?value-of<OrderServiceChargeScope> $scope
     */
    #[JsonProperty('scope')]
    private ?string $scope;

    /**
     * @param array{
     *   uid?: ?string,
     *   sourceServiceChargeUid?: ?string,
     *   name?: ?string,
     *   catalogObjectId?: ?string,
     *   catalogVersion?: ?int,
     *   percentage?: ?string,
     *   amountMoney?: ?Money,
     *   appliedMoney?: ?Money,
     *   totalMoney?: ?Money,
     *   totalTaxMoney?: ?Money,
     *   calculationPhase?: ?value-of<OrderServiceChargeCalculationPhase>,
     *   taxable?: ?bool,
     *   appliedTaxes?: ?array<OrderLineItemAppliedTax>,
     *   treatmentType?: ?value-of<OrderServiceChargeTreatmentType>,
     *   scope?: ?value-of<OrderServiceChargeScope>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->sourceServiceChargeUid = $values['sourceServiceChargeUid'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->catalogObjectId = $values['catalogObjectId'] ?? null;
        $this->catalogVersion = $values['catalogVersion'] ?? null;
        $this->percentage = $values['percentage'] ?? null;
        $this->amountMoney = $values['amountMoney'] ?? null;
        $this->appliedMoney = $values['appliedMoney'] ?? null;
        $this->totalMoney = $values['totalMoney'] ?? null;
        $this->totalTaxMoney = $values['totalTaxMoney'] ?? null;
        $this->calculationPhase = $values['calculationPhase'] ?? null;
        $this->taxable = $values['taxable'] ?? null;
        $this->appliedTaxes = $values['appliedTaxes'] ?? null;
        $this->treatmentType = $values['treatmentType'] ?? null;
        $this->scope = $values['scope'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param ?string $value
     */
    public function setUid(?string $value = null): self
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSourceServiceChargeUid(): ?string
    {
        return $this->sourceServiceChargeUid;
    }

    /**
     * @param ?string $value
     */
    public function setSourceServiceChargeUid(?string $value = null): self
    {
        $this->sourceServiceChargeUid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * @param ?string $value
     */
    public function setCatalogObjectId(?string $value = null): self
    {
        $this->catalogObjectId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCatalogVersion(): ?int
    {
        return $this->catalogVersion;
    }

    /**
     * @param ?int $value
     */
    public function setCatalogVersion(?int $value = null): self
    {
        $this->catalogVersion = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPercentage(): ?string
    {
        return $this->percentage;
    }

    /**
     * @param ?string $value
     */
    public function setPercentage(?string $value = null): self
    {
        $this->percentage = $value;
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
     * @return ?Money
     */
    public function getAppliedMoney(): ?Money
    {
        return $this->appliedMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setAppliedMoney(?Money $value = null): self
    {
        $this->appliedMoney = $value;
        return $this;
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
    public function getTotalTaxMoney(): ?Money
    {
        return $this->totalTaxMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTotalTaxMoney(?Money $value = null): self
    {
        $this->totalTaxMoney = $value;
        return $this;
    }

    /**
     * @return ?value-of<OrderServiceChargeCalculationPhase>
     */
    public function getCalculationPhase(): ?string
    {
        return $this->calculationPhase;
    }

    /**
     * @param ?value-of<OrderServiceChargeCalculationPhase> $value
     */
    public function setCalculationPhase(?string $value = null): self
    {
        $this->calculationPhase = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getTaxable(): ?bool
    {
        return $this->taxable;
    }

    /**
     * @param ?bool $value
     */
    public function setTaxable(?bool $value = null): self
    {
        $this->taxable = $value;
        return $this;
    }

    /**
     * @return ?array<OrderLineItemAppliedTax>
     */
    public function getAppliedTaxes(): ?array
    {
        return $this->appliedTaxes;
    }

    /**
     * @param ?array<OrderLineItemAppliedTax> $value
     */
    public function setAppliedTaxes(?array $value = null): self
    {
        $this->appliedTaxes = $value;
        return $this;
    }

    /**
     * @return ?value-of<OrderServiceChargeTreatmentType>
     */
    public function getTreatmentType(): ?string
    {
        return $this->treatmentType;
    }

    /**
     * @param ?value-of<OrderServiceChargeTreatmentType> $value
     */
    public function setTreatmentType(?string $value = null): self
    {
        $this->treatmentType = $value;
        return $this;
    }

    /**
     * @return ?value-of<OrderServiceChargeScope>
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * @param ?value-of<OrderServiceChargeScope> $value
     */
    public function setScope(?string $value = null): self
    {
        $this->scope = $value;
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
