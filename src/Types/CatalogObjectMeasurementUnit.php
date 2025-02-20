<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectMeasurementUnit extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogMeasurementUnit $measurementUnitData Structured data for a `CatalogMeasurementUnit`, set for CatalogObjects of type `MEASUREMENT_UNIT`.
     */
    #[JsonProperty('measurement_unit_data')]
    private ?CatalogMeasurementUnit $measurementUnitData;

    /**
     * @param array{
     *   id: string,
     *   updatedAt?: ?string,
     *   version?: ?int,
     *   isDeleted?: ?bool,
     *   customAttributeValues?: ?array<string, CatalogCustomAttributeValue>,
     *   catalogV1Ids?: ?array<CatalogV1Id>,
     *   presentAtAllLocations?: ?bool,
     *   presentAtLocationIds?: ?array<string>,
     *   absentAtLocationIds?: ?array<string>,
     *   imageId?: ?string,
     *   measurementUnitData?: ?CatalogMeasurementUnit,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->isDeleted = $values['isDeleted'] ?? null;
        $this->customAttributeValues = $values['customAttributeValues'] ?? null;
        $this->catalogV1Ids = $values['catalogV1Ids'] ?? null;
        $this->presentAtAllLocations = $values['presentAtAllLocations'] ?? null;
        $this->presentAtLocationIds = $values['presentAtLocationIds'] ?? null;
        $this->absentAtLocationIds = $values['absentAtLocationIds'] ?? null;
        $this->imageId = $values['imageId'] ?? null;
        $this->measurementUnitData = $values['measurementUnitData'] ?? null;
    }

    /**
     * @return ?CatalogMeasurementUnit
     */
    public function getMeasurementUnitData(): ?CatalogMeasurementUnit
    {
        return $this->measurementUnitData;
    }

    /**
     * @param ?CatalogMeasurementUnit $value
     */
    public function setMeasurementUnitData(?CatalogMeasurementUnit $value = null): self
    {
        $this->measurementUnitData = $value;
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
