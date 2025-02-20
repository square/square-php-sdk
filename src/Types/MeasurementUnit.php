<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a unit of measurement to use with a quantity, such as ounces
 * or inches. Exactly one of the following fields are required: `custom_unit`,
 * `area_unit`, `length_unit`, `volume_unit`, and `weight_unit`.
 */
class MeasurementUnit extends JsonSerializableType
{
    /**
     * A custom unit of measurement defined by the seller using the Point of Sale
     * app or ad-hoc as an order line item.
     *
     * @var ?MeasurementUnitCustom $customUnit
     */
    #[JsonProperty('custom_unit')]
    private ?MeasurementUnitCustom $customUnit;

    /**
     * Represents a standard area unit.
     * See [MeasurementUnitArea](#type-measurementunitarea) for possible values
     *
     * @var ?value-of<MeasurementUnitArea> $areaUnit
     */
    #[JsonProperty('area_unit')]
    private ?string $areaUnit;

    /**
     * Represents a standard length unit.
     * See [MeasurementUnitLength](#type-measurementunitlength) for possible values
     *
     * @var ?value-of<MeasurementUnitLength> $lengthUnit
     */
    #[JsonProperty('length_unit')]
    private ?string $lengthUnit;

    /**
     * Represents a standard volume unit.
     * See [MeasurementUnitVolume](#type-measurementunitvolume) for possible values
     *
     * @var ?value-of<MeasurementUnitVolume> $volumeUnit
     */
    #[JsonProperty('volume_unit')]
    private ?string $volumeUnit;

    /**
     * Represents a standard unit of weight or mass.
     * See [MeasurementUnitWeight](#type-measurementunitweight) for possible values
     *
     * @var ?value-of<MeasurementUnitWeight> $weightUnit
     */
    #[JsonProperty('weight_unit')]
    private ?string $weightUnit;

    /**
     * Reserved for API integrations that lack the ability to specify a real measurement unit
     * See [MeasurementUnitGeneric](#type-measurementunitgeneric) for possible values
     *
     * @var ?'UNIT' $genericUnit
     */
    #[JsonProperty('generic_unit')]
    private ?string $genericUnit;

    /**
     * Represents a standard unit of time.
     * See [MeasurementUnitTime](#type-measurementunittime) for possible values
     *
     * @var ?value-of<MeasurementUnitTime> $timeUnit
     */
    #[JsonProperty('time_unit')]
    private ?string $timeUnit;

    /**
     * Represents the type of the measurement unit.
     * See [MeasurementUnitUnitType](#type-measurementunitunittype) for possible values
     *
     * @var ?value-of<MeasurementUnitUnitType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @param array{
     *   customUnit?: ?MeasurementUnitCustom,
     *   areaUnit?: ?value-of<MeasurementUnitArea>,
     *   lengthUnit?: ?value-of<MeasurementUnitLength>,
     *   volumeUnit?: ?value-of<MeasurementUnitVolume>,
     *   weightUnit?: ?value-of<MeasurementUnitWeight>,
     *   genericUnit?: ?'UNIT',
     *   timeUnit?: ?value-of<MeasurementUnitTime>,
     *   type?: ?value-of<MeasurementUnitUnitType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customUnit = $values['customUnit'] ?? null;
        $this->areaUnit = $values['areaUnit'] ?? null;
        $this->lengthUnit = $values['lengthUnit'] ?? null;
        $this->volumeUnit = $values['volumeUnit'] ?? null;
        $this->weightUnit = $values['weightUnit'] ?? null;
        $this->genericUnit = $values['genericUnit'] ?? null;
        $this->timeUnit = $values['timeUnit'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return ?MeasurementUnitCustom
     */
    public function getCustomUnit(): ?MeasurementUnitCustom
    {
        return $this->customUnit;
    }

    /**
     * @param ?MeasurementUnitCustom $value
     */
    public function setCustomUnit(?MeasurementUnitCustom $value = null): self
    {
        $this->customUnit = $value;
        return $this;
    }

    /**
     * @return ?value-of<MeasurementUnitArea>
     */
    public function getAreaUnit(): ?string
    {
        return $this->areaUnit;
    }

    /**
     * @param ?value-of<MeasurementUnitArea> $value
     */
    public function setAreaUnit(?string $value = null): self
    {
        $this->areaUnit = $value;
        return $this;
    }

    /**
     * @return ?value-of<MeasurementUnitLength>
     */
    public function getLengthUnit(): ?string
    {
        return $this->lengthUnit;
    }

    /**
     * @param ?value-of<MeasurementUnitLength> $value
     */
    public function setLengthUnit(?string $value = null): self
    {
        $this->lengthUnit = $value;
        return $this;
    }

    /**
     * @return ?value-of<MeasurementUnitVolume>
     */
    public function getVolumeUnit(): ?string
    {
        return $this->volumeUnit;
    }

    /**
     * @param ?value-of<MeasurementUnitVolume> $value
     */
    public function setVolumeUnit(?string $value = null): self
    {
        $this->volumeUnit = $value;
        return $this;
    }

    /**
     * @return ?value-of<MeasurementUnitWeight>
     */
    public function getWeightUnit(): ?string
    {
        return $this->weightUnit;
    }

    /**
     * @param ?value-of<MeasurementUnitWeight> $value
     */
    public function setWeightUnit(?string $value = null): self
    {
        $this->weightUnit = $value;
        return $this;
    }

    /**
     * @return ?'UNIT'
     */
    public function getGenericUnit(): ?string
    {
        return $this->genericUnit;
    }

    /**
     * @param ?'UNIT' $value
     */
    public function setGenericUnit(?string $value = null): self
    {
        $this->genericUnit = $value;
        return $this;
    }

    /**
     * @return ?value-of<MeasurementUnitTime>
     */
    public function getTimeUnit(): ?string
    {
        return $this->timeUnit;
    }

    /**
     * @param ?value-of<MeasurementUnitTime> $value
     */
    public function setTimeUnit(?string $value = null): self
    {
        $this->timeUnit = $value;
        return $this;
    }

    /**
     * @return ?value-of<MeasurementUnitUnitType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<MeasurementUnitUnitType> $value
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
