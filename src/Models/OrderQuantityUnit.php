<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Contains the measurement unit for a quantity and a precision which
 * specifies the number of digits after the decimal point for decimal quantities.
 */
class OrderQuantityUnit implements \JsonSerializable
{
    /**
     * @var MeasurementUnit|null
     */
    private $measurementUnit;

    /**
     * @var int|null
     */
    private $precision;

    /**
     * Returns Measurement Unit.
     *
     * Represents a unit of measurement to use with a quantity, such as ounces
     * or inches. Exactly one of the following fields are required: `custom_unit`,
     * `area_unit`, `length_unit`, `volume_unit`, and `weight_unit`.
     */
    public function getMeasurementUnit(): ?MeasurementUnit
    {
        return $this->measurementUnit;
    }

    /**
     * Sets Measurement Unit.
     *
     * Represents a unit of measurement to use with a quantity, such as ounces
     * or inches. Exactly one of the following fields are required: `custom_unit`,
     * `area_unit`, `length_unit`, `volume_unit`, and `weight_unit`.
     *
     * @maps measurement_unit
     */
    public function setMeasurementUnit(?MeasurementUnit $measurementUnit): void
    {
        $this->measurementUnit = $measurementUnit;
    }

    /**
     * Returns Precision.
     *
     * For non-integer quantities, represents the number of digits after the decimal point that are
     * recorded for this quantity.
     *
     * For example, a precision of 1 allows quantities like `"1.0"` and `"1.1"`, but not `"1.01"`.
     *
     * Min: 0. Max: 5.
     */
    public function getPrecision(): ?int
    {
        return $this->precision;
    }

    /**
     * Sets Precision.
     *
     * For non-integer quantities, represents the number of digits after the decimal point that are
     * recorded for this quantity.
     *
     * For example, a precision of 1 allows quantities like `"1.0"` and `"1.1"`, but not `"1.01"`.
     *
     * Min: 0. Max: 5.
     *
     * @maps precision
     */
    public function setPrecision(?int $precision): void
    {
        $this->precision = $precision;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['measurement_unit'] = $this->measurementUnit;
        $json['precision']       = $this->precision;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
