<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1Fee
 */
class V1Fee implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $rate;

    /**
     * @var string|null
     */
    private $calculationPhase;

    /**
     * @var string|null
     */
    private $adjustmentType;

    /**
     * @var bool|null
     */
    private $appliesToCustomAmounts;

    /**
     * @var bool|null
     */
    private $enabled;

    /**
     * @var string|null
     */
    private $inclusionType;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $v2Id;

    /**
     * Returns Id.
     *
     * The fee's unique ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The fee's unique ID.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Name.
     *
     * The fee's name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The fee's name.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Rate.
     *
     * The rate of the fee, as a string representation of a decimal number. A value of 0.07 corresponds to
     * a rate of 7%.
     */
    public function getRate(): ?string
    {
        return $this->rate;
    }

    /**
     * Sets Rate.
     *
     * The rate of the fee, as a string representation of a decimal number. A value of 0.07 corresponds to
     * a rate of 7%.
     *
     * @maps rate
     */
    public function setRate(?string $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * Returns Calculation Phase.
     */
    public function getCalculationPhase(): ?string
    {
        return $this->calculationPhase;
    }

    /**
     * Sets Calculation Phase.
     *
     * @maps calculation_phase
     */
    public function setCalculationPhase(?string $calculationPhase): void
    {
        $this->calculationPhase = $calculationPhase;
    }

    /**
     * Returns Adjustment Type.
     */
    public function getAdjustmentType(): ?string
    {
        return $this->adjustmentType;
    }

    /**
     * Sets Adjustment Type.
     *
     * @maps adjustment_type
     */
    public function setAdjustmentType(?string $adjustmentType): void
    {
        $this->adjustmentType = $adjustmentType;
    }

    /**
     * Returns Applies to Custom Amounts.
     *
     * If true, the fee applies to custom amounts entered into Square Point of Sale that are not associated
     * with a particular item.
     */
    public function getAppliesToCustomAmounts(): ?bool
    {
        return $this->appliesToCustomAmounts;
    }

    /**
     * Sets Applies to Custom Amounts.
     *
     * If true, the fee applies to custom amounts entered into Square Point of Sale that are not associated
     * with a particular item.
     *
     * @maps applies_to_custom_amounts
     */
    public function setAppliesToCustomAmounts(?bool $appliesToCustomAmounts): void
    {
        $this->appliesToCustomAmounts = $appliesToCustomAmounts;
    }

    /**
     * Returns Enabled.
     *
     * If true, the fee is applied to all appropriate items. If false, the fee is not applied at all.
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * Sets Enabled.
     *
     * If true, the fee is applied to all appropriate items. If false, the fee is not applied at all.
     *
     * @maps enabled
     */
    public function setEnabled(?bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * Returns Inclusion Type.
     */
    public function getInclusionType(): ?string
    {
        return $this->inclusionType;
    }

    /**
     * Sets Inclusion Type.
     *
     * @maps inclusion_type
     */
    public function setInclusionType(?string $inclusionType): void
    {
        $this->inclusionType = $inclusionType;
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
     * Returns V 2 Id.
     *
     * The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations
     * share the same v2 ID.
     */
    public function getV2Id(): ?string
    {
        return $this->v2Id;
    }

    /**
     * Sets V 2 Id.
     *
     * The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations
     * share the same v2 ID.
     *
     * @maps v2_id
     */
    public function setV2Id(?string $v2Id): void
    {
        $this->v2Id = $v2Id;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                     = $this->id;
        $json['name']                   = $this->name;
        $json['rate']                   = $this->rate;
        $json['calculation_phase']      = $this->calculationPhase;
        $json['adjustment_type']        = $this->adjustmentType;
        $json['applies_to_custom_amounts'] = $this->appliesToCustomAmounts;
        $json['enabled']                = $this->enabled;
        $json['inclusion_type']         = $this->inclusionType;
        $json['type']                   = $this->type;
        $json['v2_id']                  = $this->v2Id;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
