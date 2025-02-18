<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the unit used to measure a `CatalogItemVariation` and
 * specifies the precision for decimal quantities.
 */
class CatalogMeasurementUnit extends JsonSerializableType
{
    /**
     * @var ?MeasurementUnit $measurementUnit Indicates the unit used to measure the quantity of a catalog item variation.
     */
    #[JsonProperty('measurement_unit')]
    private ?MeasurementUnit $measurementUnit;

    /**
     * An integer between 0 and 5 that represents the maximum number of
     * positions allowed after the decimal in quantities measured with this unit.
     * For example:
     *
     * - if the precision is 0, the quantity can be 1, 2, 3, etc.
     * - if the precision is 1, the quantity can be 0.1, 0.2, etc.
     * - if the precision is 2, the quantity can be 0.01, 0.12, etc.
     *
     * Default: 3
     *
     * @var ?int $precision
     */
    #[JsonProperty('precision')]
    private ?int $precision;

    /**
     * @param array{
     *   measurementUnit?: ?MeasurementUnit,
     *   precision?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->measurementUnit = $values['measurementUnit'] ?? null;
        $this->precision = $values['precision'] ?? null;
    }

    /**
     * @return ?MeasurementUnit
     */
    public function getMeasurementUnit(): ?MeasurementUnit
    {
        return $this->measurementUnit;
    }

    /**
     * @param ?MeasurementUnit $value
     */
    public function setMeasurementUnit(?MeasurementUnit $value = null): self
    {
        $this->measurementUnit = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getPrecision(): ?int
    {
        return $this->precision;
    }

    /**
     * @param ?int $value
     */
    public function setPrecision(?int $value = null): self
    {
        $this->precision = $value;
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
