<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectModifierList extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogModifierList $modifierListData Structured data for a `CatalogModifierList`, set for CatalogObjects of type `MODIFIER_LIST`.
     */
    #[JsonProperty('modifier_list_data')]
    private ?CatalogModifierList $modifierListData;

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
     *   modifierListData?: ?CatalogModifierList,
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
        $this->modifierListData = $values['modifierListData'] ?? null;
    }

    /**
     * @return ?CatalogModifierList
     */
    public function getModifierListData(): ?CatalogModifierList
    {
        return $this->modifierListData;
    }

    /**
     * @param ?CatalogModifierList $value
     */
    public function setModifierListData(?CatalogModifierList $value = null): self
    {
        $this->modifierListData = $value;
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
