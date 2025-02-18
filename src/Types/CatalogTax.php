<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A tax applicable to an item.
 */
class CatalogTax extends JsonSerializableType
{
    /**
     * @var ?string $name The tax's name. This is a searchable attribute for use in applicable query filters, and its value length is of Unicode code points.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * Whether the tax is calculated based on a payment's subtotal or total.
     * See [TaxCalculationPhase](#type-taxcalculationphase) for possible values
     *
     * @var ?value-of<TaxCalculationPhase> $calculationPhase
     */
    #[JsonProperty('calculation_phase')]
    private ?string $calculationPhase;

    /**
     * Whether the tax is `ADDITIVE` or `INCLUSIVE`.
     * See [TaxInclusionType](#type-taxinclusiontype) for possible values
     *
     * @var ?value-of<TaxInclusionType> $inclusionType
     */
    #[JsonProperty('inclusion_type')]
    private ?string $inclusionType;

    /**
     * The percentage of the tax in decimal form, using a `'.'` as the decimal separator and without a `'%'` sign.
     * A value of `7.5` corresponds to 7.5%. For a location-specific tax rate, contact the tax authority of the location or a tax consultant.
     *
     * @var ?string $percentage
     */
    #[JsonProperty('percentage')]
    private ?string $percentage;

    /**
     * If `true`, the fee applies to custom amounts entered into the Square Point of Sale
     * app that are not associated with a particular `CatalogItem`.
     *
     * @var ?bool $appliesToCustomAmounts
     */
    #[JsonProperty('applies_to_custom_amounts')]
    private ?bool $appliesToCustomAmounts;

    /**
     * @var ?bool $enabled A Boolean flag to indicate whether the tax is displayed as enabled (`true`) in the Square Point of Sale app or not (`false`).
     */
    #[JsonProperty('enabled')]
    private ?bool $enabled;

    /**
     * @var ?string $appliesToProductSetId The ID of a `CatalogProductSet` object. If set, the tax is applicable to all products in the product set.
     */
    #[JsonProperty('applies_to_product_set_id')]
    private ?string $appliesToProductSetId;

    /**
     * @param array{
     *   name?: ?string,
     *   calculationPhase?: ?value-of<TaxCalculationPhase>,
     *   inclusionType?: ?value-of<TaxInclusionType>,
     *   percentage?: ?string,
     *   appliesToCustomAmounts?: ?bool,
     *   enabled?: ?bool,
     *   appliesToProductSetId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->calculationPhase = $values['calculationPhase'] ?? null;
        $this->inclusionType = $values['inclusionType'] ?? null;
        $this->percentage = $values['percentage'] ?? null;
        $this->appliesToCustomAmounts = $values['appliesToCustomAmounts'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->appliesToProductSetId = $values['appliesToProductSetId'] ?? null;
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
     * @return ?value-of<TaxCalculationPhase>
     */
    public function getCalculationPhase(): ?string
    {
        return $this->calculationPhase;
    }

    /**
     * @param ?value-of<TaxCalculationPhase> $value
     */
    public function setCalculationPhase(?string $value = null): self
    {
        $this->calculationPhase = $value;
        return $this;
    }

    /**
     * @return ?value-of<TaxInclusionType>
     */
    public function getInclusionType(): ?string
    {
        return $this->inclusionType;
    }

    /**
     * @param ?value-of<TaxInclusionType> $value
     */
    public function setInclusionType(?string $value = null): self
    {
        $this->inclusionType = $value;
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
     * @return ?bool
     */
    public function getAppliesToCustomAmounts(): ?bool
    {
        return $this->appliesToCustomAmounts;
    }

    /**
     * @param ?bool $value
     */
    public function setAppliesToCustomAmounts(?bool $value = null): self
    {
        $this->appliesToCustomAmounts = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param ?bool $value
     */
    public function setEnabled(?bool $value = null): self
    {
        $this->enabled = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAppliesToProductSetId(): ?string
    {
        return $this->appliesToProductSetId;
    }

    /**
     * @param ?string $value
     */
    public function setAppliesToProductSetId(?string $value = null): self
    {
        $this->appliesToProductSetId = $value;
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
