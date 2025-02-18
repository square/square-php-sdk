<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;
use Square\Core\Types\Union;

/**
 * Represents a service charge applied to an order.
 */
class OrderServiceCharge extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID that identifies the service charge only within this order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * @var ?string $name The name of the service charge.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $catalogObjectId The catalog object ID referencing the service charge [CatalogObject](entity:CatalogObject).
     */
    #[JsonProperty('catalog_object_id')]
    private ?string $catalogObjectId;

    /**
     * @var ?int $catalogVersion The version of the catalog object that this service charge references.
     */
    #[JsonProperty('catalog_version')]
    private ?int $catalogVersion;

    /**
     * The service charge percentage as a string representation of a
     * decimal number. For example, `"7.25"` indicates a service charge of 7.25%.
     *
     * Exactly 1 of `percentage` or `amount_money` should be set.
     *
     * @var ?string $percentage
     */
    #[JsonProperty('percentage')]
    private ?string $percentage;

    /**
     * The amount of a non-percentage-based service charge.
     *
     * Exactly one of `percentage` or `amount_money` should be set.
     *
     * @var ?Money $amountMoney
     */
    #[JsonProperty('amount_money')]
    private ?Money $amountMoney;

    /**
     * The amount of money applied to the order by the service charge,
     * including any inclusive tax amounts, as calculated by Square.
     *
     * - For fixed-amount service charges, `applied_money` is equal to `amount_money`.
     * - For percentage-based service charges, `applied_money` is the money
     * calculated using the percentage.
     *
     * @var ?Money $appliedMoney
     */
    #[JsonProperty('applied_money')]
    private ?Money $appliedMoney;

    /**
     * The total amount of money to collect for the service charge.
     *
     * __Note__: If an inclusive tax is applied to the service charge,
     * `total_money` does not equal `applied_money` plus `total_tax_money`
     * because the inclusive tax amount is already included in both
     * `applied_money` and `total_tax_money`.
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
     * The calculation phase at which to apply the service charge.
     * See [OrderServiceChargeCalculationPhase](#type-orderservicechargecalculationphase) for possible values
     *
     * @var ?value-of<OrderServiceChargeCalculationPhase> $calculationPhase
     */
    #[JsonProperty('calculation_phase')]
    private ?string $calculationPhase;

    /**
     * Indicates whether the service charge can be taxed. If set to `true`,
     * order-level taxes automatically apply to the service charge. Note that
     * service charges calculated in the `TOTAL_PHASE` cannot be marked as taxable.
     *
     * @var ?bool $taxable
     */
    #[JsonProperty('taxable')]
    private ?bool $taxable;

    /**
     * The list of references to the taxes applied to this service charge. Each
     * `OrderLineItemAppliedTax` has a `tax_uid` that references the `uid` of a top-level
     * `OrderLineItemTax` that is being applied to this service charge. On reads, the amount applied
     * is populated.
     *
     * An `OrderLineItemAppliedTax` is automatically created on every taxable service charge
     * for all `ORDER` scoped taxes that are added to the order. `OrderLineItemAppliedTax` records
     * for `LINE_ITEM` scoped taxes must be added in requests for the tax to apply to any taxable
     * service charge. Taxable service charges have the `taxable` field set to `true` and calculated
     * in the `SUBTOTAL_PHASE`.
     *
     * To change the amount of a tax, modify the referenced top-level tax.
     *
     * @var ?array<OrderLineItemAppliedTax> $appliedTaxes
     */
    #[JsonProperty('applied_taxes'), ArrayType([OrderLineItemAppliedTax::class])]
    private ?array $appliedTaxes;

    /**
     * Application-defined data attached to this service charge. Metadata fields are intended
     * to store descriptive references or associations with an entity in another system or store brief
     * information about the object. Square does not process this field; it only stores and returns it
     * in relevant API calls. Do not use metadata to store any sensitive information (such as personally
     * identifiable information or card details).
     *
     * Keys written by applications must be 60 characters or less and must be in the character set
     * `[a-zA-Z0-9_-]`. Entries can also include metadata generated by Square. These keys are prefixed
     * with a namespace, separated from the key with a ':' character.
     *
     * Values have a maximum length of 255 characters.
     *
     * An application can have up to 10 entries per metadata field.
     *
     * Entries written by applications are private and can only be read or modified by the same
     * application.
     *
     * For more information, see [Metadata](https://developer.squareup.com/docs/build-basics/metadata).
     *
     * @var ?array<string, ?string> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => new Union('string', 'null')])]
    private ?array $metadata;

    /**
     * The type of the service charge.
     * See [OrderServiceChargeType](#type-orderservicechargetype) for possible values
     *
     * @var ?value-of<OrderServiceChargeType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

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
     *   metadata?: ?array<string, ?string>,
     *   type?: ?value-of<OrderServiceChargeType>,
     *   treatmentType?: ?value-of<OrderServiceChargeTreatmentType>,
     *   scope?: ?value-of<OrderServiceChargeScope>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
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
        $this->metadata = $values['metadata'] ?? null;
        $this->type = $values['type'] ?? null;
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
     * @return ?array<string, ?string>
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param ?array<string, ?string> $value
     */
    public function setMetadata(?array $value = null): self
    {
        $this->metadata = $value;
        return $this;
    }

    /**
     * @return ?value-of<OrderServiceChargeType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<OrderServiceChargeType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
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
