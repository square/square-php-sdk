<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectCustomAttributeDefinition extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogCustomAttributeDefinition $customAttributeDefinitionData Structured data for a `CatalogCustomAttributeDefinition`, set for CatalogObjects of type `CUSTOM_ATTRIBUTE_DEFINITION`.
     */
    #[JsonProperty('custom_attribute_definition_data')]
    private ?CatalogCustomAttributeDefinition $customAttributeDefinitionData;

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
     *   customAttributeDefinitionData?: ?CatalogCustomAttributeDefinition,
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
        $this->customAttributeDefinitionData = $values['customAttributeDefinitionData'] ?? null;
    }

    /**
     * @return ?CatalogCustomAttributeDefinition
     */
    public function getCustomAttributeDefinitionData(): ?CatalogCustomAttributeDefinition
    {
        return $this->customAttributeDefinitionData;
    }

    /**
     * @param ?CatalogCustomAttributeDefinition $value
     */
    public function setCustomAttributeDefinitionData(?CatalogCustomAttributeDefinition $value = null): self
    {
        $this->customAttributeDefinitionData = $value;
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
