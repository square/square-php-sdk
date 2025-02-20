<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A category that can be assigned to an item or a parent category that can be assigned
 * to another category. For example, a clothing category can be assigned to a t-shirt item or
 * be made as the parent category to the pants category.
 */
class CatalogObjectCategory extends JsonSerializableType
{
    /**
     * @var ?string $id The ID of the object's category.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?int $ordinal The order of the object within the context of the category.
     */
    #[JsonProperty('ordinal')]
    private ?int $ordinal;

    /**
     * @var ?CatalogCategory $categoryData Structured data for a `CatalogCategory`, set for CatalogObjects of type `CATEGORY`.
     */
    #[JsonProperty('category_data')]
    private ?CatalogCategory $categoryData;

    /**
     * Last modification [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates) in RFC 3339 format, e.g., `"2016-08-15T23:59:33.123Z"`
     * would indicate the UTC time (denoted by `Z`) of August 15, 2016 at 23:59:33 and 123 milliseconds.
     *
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * The version of the object. When updating an object, the version supplied
     * must match the version in the database, otherwise the write will be rejected as conflicting.
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * If `true`, the object has been deleted from the database. Must be `false` for new objects
     * being inserted. When deleted, the `updated_at` field will equal the deletion time.
     *
     * @var ?bool $isDeleted
     */
    #[JsonProperty('is_deleted')]
    private ?bool $isDeleted;

    /**
     * A map (key-value pairs) of application-defined custom attribute values. The value of a key-value pair
     * is a [CatalogCustomAttributeValue](entity:CatalogCustomAttributeValue) object. The key is the `key` attribute
     * value defined in the associated [CatalogCustomAttributeDefinition](entity:CatalogCustomAttributeDefinition)
     * object defined by the application making the request.
     *
     * If the `CatalogCustomAttributeDefinition` object is
     * defined by another application, the `CatalogCustomAttributeDefinition`'s key attribute value is prefixed by
     * the defining application ID. For example, if the `CatalogCustomAttributeDefinition` has a `key` attribute of
     * `"cocoa_brand"` and the defining application ID is `"abcd1234"`, the key in the map is `"abcd1234:cocoa_brand"`
     * if the application making the request is different from the application defining the custom attribute definition.
     * Otherwise, the key used in the map is simply `"cocoa_brand"`.
     *
     * Application-defined custom attributes are set at a global (location-independent) level.
     * Custom attribute values are intended to store additional information about a catalog object
     * or associations with an entity in another system. Do not use custom attributes
     * to store any sensitive information (personally identifiable information, card details, etc.).
     *
     * @var ?array<string, CatalogCustomAttributeValue> $customAttributeValues
     */
    #[JsonProperty('custom_attribute_values'), ArrayType(['string' => CatalogCustomAttributeValue::class])]
    private ?array $customAttributeValues;

    /**
     * The Connect v1 IDs for this object at each location where it is present, where they
     * differ from the object's Connect V2 ID. The field will only be present for objects that
     * have been created or modified by legacy APIs.
     *
     * @var ?array<CatalogV1Id> $catalogV1Ids
     */
    #[JsonProperty('catalog_v1_ids'), ArrayType([CatalogV1Id::class])]
    private ?array $catalogV1Ids;

    /**
     * If `true`, this object is present at all locations (including future locations), except where specified in
     * the `absent_at_location_ids` field. If `false`, this object is not present at any locations (including future locations),
     * except where specified in the `present_at_location_ids` field. If not specified, defaults to `true`.
     *
     * @var ?bool $presentAtAllLocations
     */
    #[JsonProperty('present_at_all_locations')]
    private ?bool $presentAtAllLocations;

    /**
     * A list of locations where the object is present, even if `present_at_all_locations` is `false`.
     * This can include locations that are deactivated.
     *
     * @var ?array<string> $presentAtLocationIds
     */
    #[JsonProperty('present_at_location_ids'), ArrayType(['string'])]
    private ?array $presentAtLocationIds;

    /**
     * A list of locations where the object is not present, even if `present_at_all_locations` is `true`.
     * This can include locations that are deactivated.
     *
     * @var ?array<string> $absentAtLocationIds
     */
    #[JsonProperty('absent_at_location_ids'), ArrayType(['string'])]
    private ?array $absentAtLocationIds;

    /**
     * @var ?string $imageId Identifies the `CatalogImage` attached to this `CatalogObject`.
     */
    #[JsonProperty('image_id')]
    private ?string $imageId;

    /**
     * @param array{
     *   id?: ?string,
     *   ordinal?: ?int,
     *   categoryData?: ?CatalogCategory,
     *   updatedAt?: ?string,
     *   version?: ?int,
     *   isDeleted?: ?bool,
     *   customAttributeValues?: ?array<string, CatalogCustomAttributeValue>,
     *   catalogV1Ids?: ?array<CatalogV1Id>,
     *   presentAtAllLocations?: ?bool,
     *   presentAtLocationIds?: ?array<string>,
     *   absentAtLocationIds?: ?array<string>,
     *   imageId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->ordinal = $values['ordinal'] ?? null;
        $this->categoryData = $values['categoryData'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->isDeleted = $values['isDeleted'] ?? null;
        $this->customAttributeValues = $values['customAttributeValues'] ?? null;
        $this->catalogV1Ids = $values['catalogV1Ids'] ?? null;
        $this->presentAtAllLocations = $values['presentAtAllLocations'] ?? null;
        $this->presentAtLocationIds = $values['presentAtLocationIds'] ?? null;
        $this->absentAtLocationIds = $values['absentAtLocationIds'] ?? null;
        $this->imageId = $values['imageId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * @param ?int $value
     */
    public function setOrdinal(?int $value = null): self
    {
        $this->ordinal = $value;
        return $this;
    }

    /**
     * @return ?CatalogCategory
     */
    public function getCategoryData(): ?CatalogCategory
    {
        return $this->categoryData;
    }

    /**
     * @param ?CatalogCategory $value
     */
    public function setCategoryData(?CatalogCategory $value = null): self
    {
        $this->categoryData = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    /**
     * @param ?bool $value
     */
    public function setIsDeleted(?bool $value = null): self
    {
        $this->isDeleted = $value;
        return $this;
    }

    /**
     * @return ?array<string, CatalogCustomAttributeValue>
     */
    public function getCustomAttributeValues(): ?array
    {
        return $this->customAttributeValues;
    }

    /**
     * @param ?array<string, CatalogCustomAttributeValue> $value
     */
    public function setCustomAttributeValues(?array $value = null): self
    {
        $this->customAttributeValues = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogV1Id>
     */
    public function getCatalogV1Ids(): ?array
    {
        return $this->catalogV1Ids;
    }

    /**
     * @param ?array<CatalogV1Id> $value
     */
    public function setCatalogV1Ids(?array $value = null): self
    {
        $this->catalogV1Ids = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getPresentAtAllLocations(): ?bool
    {
        return $this->presentAtAllLocations;
    }

    /**
     * @param ?bool $value
     */
    public function setPresentAtAllLocations(?bool $value = null): self
    {
        $this->presentAtAllLocations = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getPresentAtLocationIds(): ?array
    {
        return $this->presentAtLocationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setPresentAtLocationIds(?array $value = null): self
    {
        $this->presentAtLocationIds = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getAbsentAtLocationIds(): ?array
    {
        return $this->absentAtLocationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setAbsentAtLocationIds(?array $value = null): self
    {
        $this->absentAtLocationIds = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getImageId(): ?string
    {
        return $this->imageId;
    }

    /**
     * @param ?string $value
     */
    public function setImageId(?string $value = null): self
    {
        $this->imageId = $value;
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
