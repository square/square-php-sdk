<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Contains the measurement unit for a quantity and a precision that
 * specifies the number of digits after the decimal point for decimal quantities.
 */
class OrderQuantityUnit extends JsonSerializableType
{
    /**
     * A [MeasurementUnit](entity:MeasurementUnit) that represents the
     * unit of measure for the quantity.
     *
     * @var ?MeasurementUnit $measurementUnit
     */
    #[JsonProperty('measurement_unit')]
    private ?MeasurementUnit $measurementUnit;

    /**
     * For non-integer quantities, represents the number of digits after the decimal point that are
     * recorded for this quantity.
     *
     * For example, a precision of 1 allows quantities such as `"1.0"` and `"1.1"`, but not `"1.01"`.
     *
     * Min: 0. Max: 5.
     *
     * @var ?int $precision
     */
    #[JsonProperty('precision')]
    private ?int $precision;

    /**
     * The catalog object ID referencing the
     * [CatalogMeasurementUnit](entity:CatalogMeasurementUnit).
     *
     * This field is set when this is a catalog-backed measurement unit.
     *
     * @var ?string $catalogObjectId
     */
    #[JsonProperty('catalog_object_id')]
    private ?string $catalogObjectId;

    /**
     * The version of the catalog object that this measurement unit references.
     *
     * This field is set when this is a catalog-backed measurement unit.
     *
     * @var ?int $catalogVersion
     */
    #[JsonProperty('catalog_version')]
    private ?int $catalogVersion;

    /**
     * @param array{
     *   measurementUnit?: ?MeasurementUnit,
     *   precision?: ?int,
     *   catalogObjectId?: ?string,
     *   catalogVersion?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->measurementUnit = $values['measurementUnit'] ?? null;
        $this->precision = $values['precision'] ?? null;
        $this->catalogObjectId = $values['catalogObjectId'] ?? null;
        $this->catalogVersion = $values['catalogVersion'] ?? null;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
