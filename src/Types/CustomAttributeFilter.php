<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Supported custom attribute query expressions for calling the
 * [SearchCatalogItems](api-endpoint:Catalog-SearchCatalogItems)
 * endpoint to search for items or item variations.
 */
class CustomAttributeFilter extends JsonSerializableType
{
    /**
     * A query expression to filter items or item variations by matching their custom attributes'
     * `custom_attribute_definition_id` property value against the the specified id.
     * Exactly one of `custom_attribute_definition_id` or `key` must be specified.
     *
     * @var ?string $customAttributeDefinitionId
     */
    #[JsonProperty('custom_attribute_definition_id')]
    private ?string $customAttributeDefinitionId;

    /**
     * A query expression to filter items or item variations by matching their custom attributes'
     * `key` property value against the specified key.
     * Exactly one of `custom_attribute_definition_id` or `key` must be specified.
     *
     * @var ?string $key
     */
    #[JsonProperty('key')]
    private ?string $key;

    /**
     * A query expression to filter items or item variations by matching their custom attributes'
     * `string_value`  property value against the specified text.
     * Exactly one of `string_filter`, `number_filter`, `selection_uids_filter`, or `bool_filter` must be specified.
     *
     * @var ?string $stringFilter
     */
    #[JsonProperty('string_filter')]
    private ?string $stringFilter;

    /**
     * A query expression to filter items or item variations with their custom attributes
     * containing a number value within the specified range.
     * Exactly one of `string_filter`, `number_filter`, `selection_uids_filter`, or `bool_filter` must be specified.
     *
     * @var ?Range $numberFilter
     */
    #[JsonProperty('number_filter')]
    private ?Range $numberFilter;

    /**
     * A query expression to filter items or item variations by matching  their custom attributes'
     * `selection_uid_values` values against the specified selection uids.
     * Exactly one of `string_filter`, `number_filter`, `selection_uids_filter`, or `bool_filter` must be specified.
     *
     * @var ?array<string> $selectionUidsFilter
     */
    #[JsonProperty('selection_uids_filter'), ArrayType(['string'])]
    private ?array $selectionUidsFilter;

    /**
     * A query expression to filter items or item variations by matching their custom attributes'
     * `boolean_value` property values against the specified Boolean expression.
     * Exactly one of `string_filter`, `number_filter`, `selection_uids_filter`, or `bool_filter` must be specified.
     *
     * @var ?bool $boolFilter
     */
    #[JsonProperty('bool_filter')]
    private ?bool $boolFilter;

    /**
     * @param array{
     *   customAttributeDefinitionId?: ?string,
     *   key?: ?string,
     *   stringFilter?: ?string,
     *   numberFilter?: ?Range,
     *   selectionUidsFilter?: ?array<string>,
     *   boolFilter?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customAttributeDefinitionId = $values['customAttributeDefinitionId'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->stringFilter = $values['stringFilter'] ?? null;
        $this->numberFilter = $values['numberFilter'] ?? null;
        $this->selectionUidsFilter = $values['selectionUidsFilter'] ?? null;
        $this->boolFilter = $values['boolFilter'] ?? null;
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
     * @return ?string
     */
    public function getStringFilter(): ?string
    {
        return $this->stringFilter;
    }

    /**
     * @param ?string $value
     */
    public function setStringFilter(?string $value = null): self
    {
        $this->stringFilter = $value;
        return $this;
    }

    /**
     * @return ?Range
     */
    public function getNumberFilter(): ?Range
    {
        return $this->numberFilter;
    }

    /**
     * @param ?Range $value
     */
    public function setNumberFilter(?Range $value = null): self
    {
        $this->numberFilter = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getSelectionUidsFilter(): ?array
    {
        return $this->selectionUidsFilter;
    }

    /**
     * @param ?array<string> $value
     */
    public function setSelectionUidsFilter(?array $value = null): self
    {
        $this->selectionUidsFilter = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getBoolFilter(): ?bool
    {
        return $this->boolFilter;
    }

    /**
     * @param ?bool $value
     */
    public function setBoolFilter(?bool $value = null): self
    {
        $this->boolFilter = $value;
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
