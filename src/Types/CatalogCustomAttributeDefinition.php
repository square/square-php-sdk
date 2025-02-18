<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Contains information defining a custom attribute. Custom attributes are
 * intended to store additional information about a catalog object or to associate a
 * catalog object with an entity in another system. Do not use custom attributes
 * to store any sensitive information (personally identifiable information, card details, etc.).
 * [Read more about custom attributes](https://developer.squareup.com/docs/catalog-api/add-custom-attributes)
 */
class CatalogCustomAttributeDefinition extends JsonSerializableType
{
    /**
     * The type of this custom attribute. Cannot be modified after creation.
     * Required.
     * See [CatalogCustomAttributeDefinitionType](#type-catalogcustomattributedefinitiontype) for possible values
     *
     * @var value-of<CatalogCustomAttributeDefinitionType> $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     *  The name of this definition for API and seller-facing UI purposes.
     * The name must be unique within the (merchant, application) pair. Required.
     * May not be empty and may not exceed 255 characters. Can be modified after creation.
     *
     * @var string $name
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * Seller-oriented description of the meaning of this Custom Attribute,
     * any constraints that the seller should observe, etc. May be displayed as a tooltip in Square UIs.
     *
     * @var ?string $description
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * __Read only.__ Contains information about the application that
     * created this custom attribute definition.
     *
     * @var ?SourceApplication $sourceApplication
     */
    #[JsonProperty('source_application')]
    private ?SourceApplication $sourceApplication;

    /**
     * The set of `CatalogObject` types that this custom atttribute may be applied to.
     * Currently, only `ITEM`, `ITEM_VARIATION`, `MODIFIER`, `MODIFIER_LIST`, and `CATEGORY` are allowed. At least one type must be included.
     * See [CatalogObjectType](#type-catalogobjecttype) for possible values
     *
     * @var array<value-of<CatalogObjectType>> $allowedObjectTypes
     */
    #[JsonProperty('allowed_object_types'), ArrayType(['string'])]
    private array $allowedObjectTypes;

    /**
     * The visibility of a custom attribute in seller-facing UIs (including Square Point
     * of Sale applications and Square Dashboard). May be modified.
     * See [CatalogCustomAttributeDefinitionSellerVisibility](#type-catalogcustomattributedefinitionsellervisibility) for possible values
     *
     * @var ?value-of<CatalogCustomAttributeDefinitionSellerVisibility> $sellerVisibility
     */
    #[JsonProperty('seller_visibility')]
    private ?string $sellerVisibility;

    /**
     * The visibility of a custom attribute to applications other than the application
     * that created the attribute.
     * See [CatalogCustomAttributeDefinitionAppVisibility](#type-catalogcustomattributedefinitionappvisibility) for possible values
     *
     * @var ?value-of<CatalogCustomAttributeDefinitionAppVisibility> $appVisibility
     */
    #[JsonProperty('app_visibility')]
    private ?string $appVisibility;

    /**
     * @var ?CatalogCustomAttributeDefinitionStringConfig $stringConfig Optionally, populated when `type` = `STRING`, unset otherwise.
     */
    #[JsonProperty('string_config')]
    private ?CatalogCustomAttributeDefinitionStringConfig $stringConfig;

    /**
     * @var ?CatalogCustomAttributeDefinitionNumberConfig $numberConfig Optionally, populated when `type` = `NUMBER`, unset otherwise.
     */
    #[JsonProperty('number_config')]
    private ?CatalogCustomAttributeDefinitionNumberConfig $numberConfig;

    /**
     * @var ?CatalogCustomAttributeDefinitionSelectionConfig $selectionConfig Populated when `type` is set to `SELECTION`, unset otherwise.
     */
    #[JsonProperty('selection_config')]
    private ?CatalogCustomAttributeDefinitionSelectionConfig $selectionConfig;

    /**
     * The number of custom attributes that reference this
     * custom attribute definition. Set by the server in response to a ListCatalog
     * request with `include_counts` set to `true`.  If the actual count is greater
     * than 100, `custom_attribute_usage_count` will be set to `100`.
     *
     * @var ?int $customAttributeUsageCount
     */
    #[JsonProperty('custom_attribute_usage_count')]
    private ?int $customAttributeUsageCount;

    /**
     * The name of the desired custom attribute key that can be used to access
     * the custom attribute value on catalog objects. Cannot be modified after the
     * custom attribute definition has been created.
     * Must be between 1 and 60 characters, and may only contain the characters `[a-zA-Z0-9_-]`.
     *
     * @var ?string $key
     */
    #[JsonProperty('key')]
    private ?string $key;

    /**
     * @param array{
     *   type: value-of<CatalogCustomAttributeDefinitionType>,
     *   name: string,
     *   allowedObjectTypes: array<value-of<CatalogObjectType>>,
     *   description?: ?string,
     *   sourceApplication?: ?SourceApplication,
     *   sellerVisibility?: ?value-of<CatalogCustomAttributeDefinitionSellerVisibility>,
     *   appVisibility?: ?value-of<CatalogCustomAttributeDefinitionAppVisibility>,
     *   stringConfig?: ?CatalogCustomAttributeDefinitionStringConfig,
     *   numberConfig?: ?CatalogCustomAttributeDefinitionNumberConfig,
     *   selectionConfig?: ?CatalogCustomAttributeDefinitionSelectionConfig,
     *   customAttributeUsageCount?: ?int,
     *   key?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->sourceApplication = $values['sourceApplication'] ?? null;
        $this->allowedObjectTypes = $values['allowedObjectTypes'];
        $this->sellerVisibility = $values['sellerVisibility'] ?? null;
        $this->appVisibility = $values['appVisibility'] ?? null;
        $this->stringConfig = $values['stringConfig'] ?? null;
        $this->numberConfig = $values['numberConfig'] ?? null;
        $this->selectionConfig = $values['selectionConfig'] ?? null;
        $this->customAttributeUsageCount = $values['customAttributeUsageCount'] ?? null;
        $this->key = $values['key'] ?? null;
    }

    /**
     * @return value-of<CatalogCustomAttributeDefinitionType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<CatalogCustomAttributeDefinitionType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return ?SourceApplication
     */
    public function getSourceApplication(): ?SourceApplication
    {
        return $this->sourceApplication;
    }

    /**
     * @param ?SourceApplication $value
     */
    public function setSourceApplication(?SourceApplication $value = null): self
    {
        $this->sourceApplication = $value;
        return $this;
    }

    /**
     * @return array<value-of<CatalogObjectType>>
     */
    public function getAllowedObjectTypes(): array
    {
        return $this->allowedObjectTypes;
    }

    /**
     * @param array<value-of<CatalogObjectType>> $value
     */
    public function setAllowedObjectTypes(array $value): self
    {
        $this->allowedObjectTypes = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogCustomAttributeDefinitionSellerVisibility>
     */
    public function getSellerVisibility(): ?string
    {
        return $this->sellerVisibility;
    }

    /**
     * @param ?value-of<CatalogCustomAttributeDefinitionSellerVisibility> $value
     */
    public function setSellerVisibility(?string $value = null): self
    {
        $this->sellerVisibility = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogCustomAttributeDefinitionAppVisibility>
     */
    public function getAppVisibility(): ?string
    {
        return $this->appVisibility;
    }

    /**
     * @param ?value-of<CatalogCustomAttributeDefinitionAppVisibility> $value
     */
    public function setAppVisibility(?string $value = null): self
    {
        $this->appVisibility = $value;
        return $this;
    }

    /**
     * @return ?CatalogCustomAttributeDefinitionStringConfig
     */
    public function getStringConfig(): ?CatalogCustomAttributeDefinitionStringConfig
    {
        return $this->stringConfig;
    }

    /**
     * @param ?CatalogCustomAttributeDefinitionStringConfig $value
     */
    public function setStringConfig(?CatalogCustomAttributeDefinitionStringConfig $value = null): self
    {
        $this->stringConfig = $value;
        return $this;
    }

    /**
     * @return ?CatalogCustomAttributeDefinitionNumberConfig
     */
    public function getNumberConfig(): ?CatalogCustomAttributeDefinitionNumberConfig
    {
        return $this->numberConfig;
    }

    /**
     * @param ?CatalogCustomAttributeDefinitionNumberConfig $value
     */
    public function setNumberConfig(?CatalogCustomAttributeDefinitionNumberConfig $value = null): self
    {
        $this->numberConfig = $value;
        return $this;
    }

    /**
     * @return ?CatalogCustomAttributeDefinitionSelectionConfig
     */
    public function getSelectionConfig(): ?CatalogCustomAttributeDefinitionSelectionConfig
    {
        return $this->selectionConfig;
    }

    /**
     * @param ?CatalogCustomAttributeDefinitionSelectionConfig $value
     */
    public function setSelectionConfig(?CatalogCustomAttributeDefinitionSelectionConfig $value = null): self
    {
        $this->selectionConfig = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCustomAttributeUsageCount(): ?int
    {
        return $this->customAttributeUsageCount;
    }

    /**
     * @param ?int $value
     */
    public function setCustomAttributeUsageCount(?int $value = null): self
    {
        $this->customAttributeUsageCount = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param ?string $value
     */
    public function setKey(?string $value = null): self
    {
        $this->key = $value;
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
