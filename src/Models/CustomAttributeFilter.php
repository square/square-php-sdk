<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Supported custom attribute query expressions for calling the
 * [SearchCatalogItems]($e/Catalog/SearchCatalogItems)
 * endpoint to search for items or item variations.
 */
class CustomAttributeFilter implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $customAttributeDefinitionId;

    /**
     * @var string|null
     */
    private $key;

    /**
     * @var string|null
     */
    private $stringFilter;

    /**
     * @var Range|null
     */
    private $numberFilter;

    /**
     * @var string[]|null
     */
    private $selectionUidsFilter;

    /**
     * @var bool|null
     */
    private $boolFilter;

    /**
     * Returns Custom Attribute Definition Id.
     *
     * A query expression to filter items or item variations by matching their custom attributes'
     * `custom_attribute_definition_id`
     * property value against the the specified id.
     */
    public function getCustomAttributeDefinitionId(): ?string
    {
        return $this->customAttributeDefinitionId;
    }

    /**
     * Sets Custom Attribute Definition Id.
     *
     * A query expression to filter items or item variations by matching their custom attributes'
     * `custom_attribute_definition_id`
     * property value against the the specified id.
     *
     * @maps custom_attribute_definition_id
     */
    public function setCustomAttributeDefinitionId(?string $customAttributeDefinitionId): void
    {
        $this->customAttributeDefinitionId = $customAttributeDefinitionId;
    }

    /**
     * Returns Key.
     *
     * A query expression to filter items or item variations by matching their custom attributes'
     * `key` property value against
     * the specified key.
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * Sets Key.
     *
     * A query expression to filter items or item variations by matching their custom attributes'
     * `key` property value against
     * the specified key.
     *
     * @maps key
     */
    public function setKey(?string $key): void
    {
        $this->key = $key;
    }

    /**
     * Returns String Filter.
     *
     * A query expression to filter items or item variations by matching their custom attributes'
     * `string_value`  property value
     * against the specified text.
     */
    public function getStringFilter(): ?string
    {
        return $this->stringFilter;
    }

    /**
     * Sets String Filter.
     *
     * A query expression to filter items or item variations by matching their custom attributes'
     * `string_value`  property value
     * against the specified text.
     *
     * @maps string_filter
     */
    public function setStringFilter(?string $stringFilter): void
    {
        $this->stringFilter = $stringFilter;
    }

    /**
     * Returns Number Filter.
     *
     * The range of a number value between the specified lower and upper bounds.
     */
    public function getNumberFilter(): ?Range
    {
        return $this->numberFilter;
    }

    /**
     * Sets Number Filter.
     *
     * The range of a number value between the specified lower and upper bounds.
     *
     * @maps number_filter
     */
    public function setNumberFilter(?Range $numberFilter): void
    {
        $this->numberFilter = $numberFilter;
    }

    /**
     * Returns Selection Uids Filter.
     *
     * A query expression to filter items or item variations by matching  their custom attributes'
     * `selection_uid_values`
     * values against the specified selection uids.
     *
     * @return string[]|null
     */
    public function getSelectionUidsFilter(): ?array
    {
        return $this->selectionUidsFilter;
    }

    /**
     * Sets Selection Uids Filter.
     *
     * A query expression to filter items or item variations by matching  their custom attributes'
     * `selection_uid_values`
     * values against the specified selection uids.
     *
     * @maps selection_uids_filter
     *
     * @param string[]|null $selectionUidsFilter
     */
    public function setSelectionUidsFilter(?array $selectionUidsFilter): void
    {
        $this->selectionUidsFilter = $selectionUidsFilter;
    }

    /**
     * Returns Bool Filter.
     *
     * A query expression to filter items or item variations by matching their custom attributes'
     * `boolean_value` property values
     * against the specified Boolean expression.
     */
    public function getBoolFilter(): ?bool
    {
        return $this->boolFilter;
    }

    /**
     * Sets Bool Filter.
     *
     * A query expression to filter items or item variations by matching their custom attributes'
     * `boolean_value` property values
     * against the specified Boolean expression.
     *
     * @maps bool_filter
     */
    public function setBoolFilter(?bool $boolFilter): void
    {
        $this->boolFilter = $boolFilter;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->customAttributeDefinitionId)) {
            $json['custom_attribute_definition_id'] = $this->customAttributeDefinitionId;
        }
        if (isset($this->key)) {
            $json['key']                            = $this->key;
        }
        if (isset($this->stringFilter)) {
            $json['string_filter']                  = $this->stringFilter;
        }
        if (isset($this->numberFilter)) {
            $json['number_filter']                  = $this->numberFilter;
        }
        if (isset($this->selectionUidsFilter)) {
            $json['selection_uids_filter']          = $this->selectionUidsFilter;
        }
        if (isset($this->boolFilter)) {
            $json['bool_filter']                    = $this->boolFilter;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
