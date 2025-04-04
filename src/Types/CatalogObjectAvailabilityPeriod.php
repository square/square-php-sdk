<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectAvailabilityPeriod extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogAvailabilityPeriod $availabilityPeriodData Structured data for a `CatalogAvailabilityPeriod`, set for CatalogObjects of type `AVAILABILITY_PERIOD`.
     */
    #[JsonProperty('availability_period_data')]
    private ?CatalogAvailabilityPeriod $availabilityPeriodData;

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
     *   availabilityPeriodData?: ?CatalogAvailabilityPeriod,
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
        $this->availabilityPeriodData = $values['availabilityPeriodData'] ?? null;
    }

    /**
     * @return ?CatalogAvailabilityPeriod
     */
    public function getAvailabilityPeriodData(): ?CatalogAvailabilityPeriod
    {
        return $this->availabilityPeriodData;
    }

    /**
     * @param ?CatalogAvailabilityPeriod $value
     */
    public function setAvailabilityPeriodData(?CatalogAvailabilityPeriod $value = null): self
    {
        $this->availabilityPeriodData = $value;
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
