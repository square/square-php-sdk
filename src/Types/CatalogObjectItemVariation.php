<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectItemVariation extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogItemVariation $itemVariationData Structured data for a `CatalogItemVariation`, set for CatalogObjects of type `ITEM_VARIATION`.
     */
    #[JsonProperty('item_variation_data')]
    private ?CatalogItemVariation $itemVariationData;

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
     *   itemVariationData?: ?CatalogItemVariation,
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
        $this->itemVariationData = $values['itemVariationData'] ?? null;
    }

    /**
     * @return ?CatalogItemVariation
     */
    public function getItemVariationData(): ?CatalogItemVariation
    {
        return $this->itemVariationData;
    }

    /**
     * @param ?CatalogItemVariation $value
     */
    public function setItemVariationData(?CatalogItemVariation $value = null): self
    {
        $this->itemVariationData = $value;
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
