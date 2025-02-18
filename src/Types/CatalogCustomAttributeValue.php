<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * An instance of a custom attribute. Custom attributes can be defined and
 * added to `ITEM` and `ITEM_VARIATION` type catalog objects.
 * [Read more about custom attributes](https://developer.squareup.com/docs/catalog-api/add-custom-attributes).
 */
class CatalogCustomAttributeValue extends JsonSerializableType
{
    /**
     * @var ?string $name The name of the custom attribute.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $stringValue The string value of the custom attribute.  Populated if `type` = `STRING`.
     */
    #[JsonProperty('string_value')]
    private ?string $stringValue;

    /**
     * @var ?string $customAttributeDefinitionId The id of the [CatalogCustomAttributeDefinition](entity:CatalogCustomAttributeDefinition) this value belongs to.
     */
    #[JsonProperty('custom_attribute_definition_id')]
    private ?string $customAttributeDefinitionId;

    /**
     * A copy of type from the associated `CatalogCustomAttributeDefinition`.
     * See [CatalogCustomAttributeDefinitionType](#type-catalogcustomattributedefinitiontype) for possible values
     *
     * @var ?value-of<CatalogCustomAttributeDefinitionType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * Populated if `type` = `NUMBER`. Contains a string
     * representation of a decimal number, using a `.` as the decimal separator.
     *
     * @var ?string $numberValue
     */
    #[JsonProperty('number_value')]
    private ?string $numberValue;

    /**
     * @var ?bool $booleanValue A `true` or `false` value. Populated if `type` = `BOOLEAN`.
     */
    #[JsonProperty('boolean_value')]
    private ?bool $booleanValue;

    /**
     * @var ?array<string> $selectionUidValues One or more choices from `allowed_selections`. Populated if `type` = `SELECTION`.
     */
    #[JsonProperty('selection_uid_values'), ArrayType(['string'])]
    private ?array $selectionUidValues;

    /**
     * If the associated `CatalogCustomAttributeDefinition` object is defined by another application, this key is prefixed by the defining application ID.
     * For example, if the CatalogCustomAttributeDefinition has a key attribute of "cocoa_brand" and the defining application ID is "abcd1234", this key is "abcd1234:cocoa_brand"
     * when the application making the request is different from the application defining the custom attribute definition. Otherwise, the key is simply "cocoa_brand".
     *
     * @var ?string $key
     */
    #[JsonProperty('key')]
    private ?string $key;

    /**
     * @param array{
     *   name?: ?string,
     *   stringValue?: ?string,
     *   customAttributeDefinitionId?: ?string,
     *   type?: ?value-of<CatalogCustomAttributeDefinitionType>,
     *   numberValue?: ?string,
     *   booleanValue?: ?bool,
     *   selectionUidValues?: ?array<string>,
     *   key?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->stringValue = $values['stringValue'] ?? null;
        $this->customAttributeDefinitionId = $values['customAttributeDefinitionId'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->numberValue = $values['numberValue'] ?? null;
        $this->booleanValue = $values['booleanValue'] ?? null;
        $this->selectionUidValues = $values['selectionUidValues'] ?? null;
        $this->key = $values['key'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getStringValue(): ?string
    {
        return $this->stringValue;
    }

    /**
     * @param ?string $value
     */
    public function setStringValue(?string $value = null): self
    {
        $this->stringValue = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCustomAttributeDefinitionId(): ?string
    {
        return $this->customAttributeDefinitionId;
    }

    /**
     * @param ?string $value
     */
    public function setCustomAttributeDefinitionId(?string $value = null): self
    {
        $this->customAttributeDefinitionId = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogCustomAttributeDefinitionType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<CatalogCustomAttributeDefinitionType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNumberValue(): ?string
    {
        return $this->numberValue;
    }

    /**
     * @param ?string $value
     */
    public function setNumberValue(?string $value = null): self
    {
        $this->numberValue = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getBooleanValue(): ?bool
    {
        return $this->booleanValue;
    }

    /**
     * @param ?bool $value
     */
    public function setBooleanValue(?bool $value = null): self
    {
        $this->booleanValue = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getSelectionUidValues(): ?array
    {
        return $this->selectionUidValues;
    }

    /**
     * @param ?array<string> $value
     */
    public function setSelectionUidValues(?array $value = null): self
    {
        $this->selectionUidValues = $value;
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
