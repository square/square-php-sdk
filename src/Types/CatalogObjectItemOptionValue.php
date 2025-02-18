<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectItemOptionValue extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogItemOptionValue $itemOptionValueData Structured data for a `CatalogItemOptionValue`, set for CatalogObjects of type `ITEM_OPTION_VAL`.
     */
    #[JsonProperty('item_option_value_data')]
    private ?CatalogItemOptionValue $itemOptionValueData;

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
     *   itemOptionValueData?: ?CatalogItemOptionValue,
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
        $this->itemOptionValueData = $values['itemOptionValueData'] ?? null;
    }

    /**
     * @return ?CatalogItemOptionValue
     */
    public function getItemOptionValueData(): ?CatalogItemOptionValue
    {
        return $this->itemOptionValueData;
    }

    /**
     * @param ?CatalogItemOptionValue $value
     */
    public function setItemOptionValueData(?CatalogItemOptionValue $value = null): self
    {
        $this->itemOptionValueData = $value;
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
