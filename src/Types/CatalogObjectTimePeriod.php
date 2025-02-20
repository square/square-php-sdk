<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectTimePeriod extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogTimePeriod $timePeriodData Structured data for a `CatalogTimePeriod`, set for CatalogObjects of type `TIME_PERIOD`.
     */
    #[JsonProperty('time_period_data')]
    private ?CatalogTimePeriod $timePeriodData;

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
     *   timePeriodData?: ?CatalogTimePeriod,
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
        $this->timePeriodData = $values['timePeriodData'] ?? null;
    }

    /**
     * @return ?CatalogTimePeriod
     */
    public function getTimePeriodData(): ?CatalogTimePeriod
    {
        return $this->timePeriodData;
    }

    /**
     * @param ?CatalogTimePeriod $value
     */
    public function setTimePeriodData(?CatalogTimePeriod $value = null): self
    {
        $this->timePeriodData = $value;
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
