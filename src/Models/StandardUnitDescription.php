<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Contains the name and abbreviation for standard measurement unit.
 */
class StandardUnitDescription implements \JsonSerializable
{
    /**
     * @var MeasurementUnit|null
     */
    private $unit;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $abbreviation;

    /**
     * Returns Unit.
     *
     * Represents a unit of measurement to use with a quantity, such as ounces
     * or inches. Exactly one of the following fields are required: `custom_unit`,
     * `area_unit`, `length_unit`, `volume_unit`, and `weight_unit`.
     */
    public function getUnit(): ?MeasurementUnit
    {
        return $this->unit;
    }

    /**
     * Sets Unit.
     *
     * Represents a unit of measurement to use with a quantity, such as ounces
     * or inches. Exactly one of the following fields are required: `custom_unit`,
     * `area_unit`, `length_unit`, `volume_unit`, and `weight_unit`.
     *
     * @maps unit
     */
    public function setUnit(?MeasurementUnit $unit): void
    {
        $this->unit = $unit;
    }

    /**
     * Returns Name.
     *
     * UI display name of the measurement unit. For example, 'Pound'.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * UI display name of the measurement unit. For example, 'Pound'.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Abbreviation.
     *
     * UI display abbreviation for the measurement unit. For example, 'lb'.
     */
    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    /**
     * Sets Abbreviation.
     *
     * UI display abbreviation for the measurement unit. For example, 'lb'.
     *
     * @maps abbreviation
     */
    public function setAbbreviation(?string $abbreviation): void
    {
        $this->abbreviation = $abbreviation;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->unit)) {
            $json['unit']         = $this->unit;
        }
        if (isset($this->name)) {
            $json['name']         = $this->name;
        }
        if (isset($this->abbreviation)) {
            $json['abbreviation'] = $this->abbreviation;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
