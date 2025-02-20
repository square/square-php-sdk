<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectDiscount extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogDiscount $discountData Structured data for a `CatalogDiscount`, set for CatalogObjects of type `DISCOUNT`.
     */
    #[JsonProperty('discount_data')]
    private ?CatalogDiscount $discountData;

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
     *   discountData?: ?CatalogDiscount,
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
        $this->discountData = $values['discountData'] ?? null;
    }

    /**
     * @return ?CatalogDiscount
     */
    public function getDiscountData(): ?CatalogDiscount
    {
        return $this->discountData;
    }

    /**
     * @param ?CatalogDiscount $value
     */
    public function setDiscountData(?CatalogDiscount $value = null): self
    {
        $this->discountData = $value;
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
