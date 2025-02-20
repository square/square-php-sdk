<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectProductSet extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogProductSet $productSetData Structured data for a `CatalogProductSet`, set for CatalogObjects of type `PRODUCT_SET`.
     */
    #[JsonProperty('product_set_data')]
    private ?CatalogProductSet $productSetData;

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
     *   productSetData?: ?CatalogProductSet,
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
        $this->productSetData = $values['productSetData'] ?? null;
    }

    /**
     * @return ?CatalogProductSet
     */
    public function getProductSetData(): ?CatalogProductSet
    {
        return $this->productSetData;
    }

    /**
     * @param ?CatalogProductSet $value
     */
    public function setProductSetData(?CatalogProductSet $value = null): self
    {
        $this->productSetData = $value;
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
