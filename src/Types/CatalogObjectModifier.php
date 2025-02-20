<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectModifier extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogModifier $modifierData Structured data for a `CatalogModifier`, set for CatalogObjects of type `MODIFIER`.
     */
    #[JsonProperty('modifier_data')]
    private ?CatalogModifier $modifierData;

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
     *   modifierData?: ?CatalogModifier,
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
        $this->modifierData = $values['modifierData'] ?? null;
    }

    /**
     * @return ?CatalogModifier
     */
    public function getModifierData(): ?CatalogModifier
    {
        return $this->modifierData;
    }

    /**
     * @param ?CatalogModifier $value
     */
    public function setModifierData(?CatalogModifier $value = null): self
    {
        $this->modifierData = $value;
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
