<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectItemOption extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogItemOption $itemOptionData Structured data for a `CatalogItemOption`, set for CatalogObjects of type `ITEM_OPTION`.
     */
    #[JsonProperty('item_option_data')]
    private ?CatalogItemOption $itemOptionData;

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
     *   itemOptionData?: ?CatalogItemOption,
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
        $this->itemOptionData = $values['itemOptionData'] ?? null;
    }

    /**
     * @return ?CatalogItemOption
     */
    public function getItemOptionData(): ?CatalogItemOption
    {
        return $this->itemOptionData;
    }

    /**
     * @param ?CatalogItemOption $value
     */
    public function setItemOptionData(?CatalogItemOption $value = null): self
    {
        $this->itemOptionData = $value;
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
