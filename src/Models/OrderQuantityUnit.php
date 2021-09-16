<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Contains the measurement unit for a quantity and a precision that
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
     * @var string|null
     */
    private $catalogObjectId;

    /**
     * @var int|null
     */
    private $catalogVersion;

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
     * For example, a precision of 1 allows quantities such as `"1.0"` and `"1.1"`, but not `"1.01"`.
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
     * For example, a precision of 1 allows quantities such as `"1.0"` and `"1.1"`, but not `"1.01"`.
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
     * Returns Catalog Object Id.
     *
     * The catalog object ID referencing the
     * [CatalogMeasurementUnit]($m/CatalogMeasurementUnit).
     *
     * This field is set when this is a catalog-backed measurement unit.
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The catalog object ID referencing the
     * [CatalogMeasurementUnit]($m/CatalogMeasurementUnit).
     *
     * This field is set when this is a catalog-backed measurement unit.
     *
     * @maps catalog_object_id
     */
    public function setCatalogObjectId(?string $catalogObjectId): void
    {
        $this->catalogObjectId = $catalogObjectId;
    }

    /**
     * Returns Catalog Version.
     *
     * The version of the catalog object that this measurement unit references.
     *
     * This field is set when this is a catalog-backed measurement unit.
     */
    public function getCatalogVersion(): ?int
    {
        return $this->catalogVersion;
    }

    /**
     * Sets Catalog Version.
     *
     * The version of the catalog object that this measurement unit references.
     *
     * This field is set when this is a catalog-backed measurement unit.
     *
     * @maps catalog_version
     */
    public function setCatalogVersion(?int $catalogVersion): void
    {
        $this->catalogVersion = $catalogVersion;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->measurementUnit)) {
            $json['measurement_unit']  = $this->measurementUnit;
        }
        if (isset($this->precision)) {
            $json['precision']         = $this->precision;
        }
        if (isset($this->catalogObjectId)) {
            $json['catalog_object_id'] = $this->catalogObjectId;
        }
        if (isset($this->catalogVersion)) {
            $json['catalog_version']   = $this->catalogVersion;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
