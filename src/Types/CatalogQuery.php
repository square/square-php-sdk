<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A query composed of one or more different types of filters to narrow the scope of targeted objects when calling the `SearchCatalogObjects` endpoint.
 *
 * Although a query can have multiple filters, only certain query types can be combined per call to [SearchCatalogObjects](api-endpoint:Catalog-SearchCatalogObjects).
 * Any combination of the following types may be used together:
 * - [exact_query](entity:CatalogQueryExact)
 * - [prefix_query](entity:CatalogQueryPrefix)
 * - [range_query](entity:CatalogQueryRange)
 * - [sorted_attribute_query](entity:CatalogQuerySortedAttribute)
 * - [text_query](entity:CatalogQueryText)
 *
 * All other query types cannot be combined with any others.
 *
 * When a query filter is based on an attribute, the attribute must be searchable.
 * Searchable attributes are listed as follows, along their parent types that can be searched for with applicable query filters.
 *
 * Searchable attribute and objects queryable by searchable attributes:
 * - `name`:  `CatalogItem`, `CatalogItemVariation`, `CatalogCategory`, `CatalogTax`, `CatalogDiscount`, `CatalogModifier`, `CatalogModifierList`, `CatalogItemOption`, `CatalogItemOptionValue`
 * - `description`: `CatalogItem`, `CatalogItemOptionValue`
 * - `abbreviation`: `CatalogItem`
 * - `upc`: `CatalogItemVariation`
 * - `sku`: `CatalogItemVariation`
 * - `caption`: `CatalogImage`
 * - `display_name`: `CatalogItemOption`
 *
 * For example, to search for [CatalogItem](entity:CatalogItem) objects by searchable attributes, you can use
 * the `"name"`, `"description"`, or `"abbreviation"` attribute in an applicable query filter.
 */
class CatalogQuery extends JsonSerializableType
{
    /**
     * @var ?CatalogQuerySortedAttribute $sortedAttributeQuery A query expression to sort returned query result by the given attribute.
     */
    #[JsonProperty('sorted_attribute_query')]
    private ?CatalogQuerySortedAttribute $sortedAttributeQuery;

    /**
     * An exact query expression to return objects with attribute name and value
     * matching the specified attribute name and value exactly. Value matching is case insensitive.
     *
     * @var ?CatalogQueryExact $exactQuery
     */
    #[JsonProperty('exact_query')]
    private ?CatalogQueryExact $exactQuery;

    /**
     * A set query expression to return objects with attribute name and value
     * matching the specified attribute name and any of the specified attribute values exactly.
     * Value matching is case insensitive.
     *
     * @var ?CatalogQuerySet $setQuery
     */
    #[JsonProperty('set_query')]
    private ?CatalogQuerySet $setQuery;

    /**
     * A prefix query expression to return objects with attribute values
     * that have a prefix matching the specified string value. Value matching is case insensitive.
     *
     * @var ?CatalogQueryPrefix $prefixQuery
     */
    #[JsonProperty('prefix_query')]
    private ?CatalogQueryPrefix $prefixQuery;

    /**
     * A range query expression to return objects with numeric values
     * that lie in the specified range.
     *
     * @var ?CatalogQueryRange $rangeQuery
     */
    #[JsonProperty('range_query')]
    private ?CatalogQueryRange $rangeQuery;

    /**
     * A text query expression to return objects whose searchable attributes contain all of the given
     * keywords, irrespective of their order. For example, if a `CatalogItem` contains custom attribute values of
     * `{"name": "t-shirt"}` and `{"description": "Small, Purple"}`, the query filter of `{"keywords": ["shirt", "sma", "purp"]}`
     * returns this item.
     *
     * @var ?CatalogQueryText $textQuery
     */
    #[JsonProperty('text_query')]
    private ?CatalogQueryText $textQuery;

    /**
     * @var ?CatalogQueryItemsForTax $itemsForTaxQuery A query expression to return items that have any of the specified taxes (as identified by the corresponding `CatalogTax` object IDs) enabled.
     */
    #[JsonProperty('items_for_tax_query')]
    private ?CatalogQueryItemsForTax $itemsForTaxQuery;

    /**
     * @var ?CatalogQueryItemsForModifierList $itemsForModifierListQuery A query expression to return items that have any of the given modifier list (as identified by the corresponding `CatalogModifierList`s IDs) enabled.
     */
    #[JsonProperty('items_for_modifier_list_query')]
    private ?CatalogQueryItemsForModifierList $itemsForModifierListQuery;

    /**
     * @var ?CatalogQueryItemsForItemOptions $itemsForItemOptionsQuery A query expression to return items that contains the specified item options (as identified the corresponding `CatalogItemOption` IDs).
     */
    #[JsonProperty('items_for_item_options_query')]
    private ?CatalogQueryItemsForItemOptions $itemsForItemOptionsQuery;

    /**
     * A query expression to return item variations (of the [CatalogItemVariation](entity:CatalogItemVariation) type) that
     * contain all of the specified `CatalogItemOption` IDs.
     *
     * @var ?CatalogQueryItemVariationsForItemOptionValues $itemVariationsForItemOptionValuesQuery
     */
    #[JsonProperty('item_variations_for_item_option_values_query')]
    private ?CatalogQueryItemVariationsForItemOptionValues $itemVariationsForItemOptionValuesQuery;

    /**
     * @param array{
     *   sortedAttributeQuery?: ?CatalogQuerySortedAttribute,
     *   exactQuery?: ?CatalogQueryExact,
     *   setQuery?: ?CatalogQuerySet,
     *   prefixQuery?: ?CatalogQueryPrefix,
     *   rangeQuery?: ?CatalogQueryRange,
     *   textQuery?: ?CatalogQueryText,
     *   itemsForTaxQuery?: ?CatalogQueryItemsForTax,
     *   itemsForModifierListQuery?: ?CatalogQueryItemsForModifierList,
     *   itemsForItemOptionsQuery?: ?CatalogQueryItemsForItemOptions,
     *   itemVariationsForItemOptionValuesQuery?: ?CatalogQueryItemVariationsForItemOptionValues,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sortedAttributeQuery = $values['sortedAttributeQuery'] ?? null;
        $this->exactQuery = $values['exactQuery'] ?? null;
        $this->setQuery = $values['setQuery'] ?? null;
        $this->prefixQuery = $values['prefixQuery'] ?? null;
        $this->rangeQuery = $values['rangeQuery'] ?? null;
        $this->textQuery = $values['textQuery'] ?? null;
        $this->itemsForTaxQuery = $values['itemsForTaxQuery'] ?? null;
        $this->itemsForModifierListQuery = $values['itemsForModifierListQuery'] ?? null;
        $this->itemsForItemOptionsQuery = $values['itemsForItemOptionsQuery'] ?? null;
        $this->itemVariationsForItemOptionValuesQuery = $values['itemVariationsForItemOptionValuesQuery'] ?? null;
    }

    /**
     * @return ?CatalogQuerySortedAttribute
     */
    public function getSortedAttributeQuery(): ?CatalogQuerySortedAttribute
    {
        return $this->sortedAttributeQuery;
    }

    /**
     * @param ?CatalogQuerySortedAttribute $value
     */
    public function setSortedAttributeQuery(?CatalogQuerySortedAttribute $value = null): self
    {
        $this->sortedAttributeQuery = $value;
        return $this;
    }

    /**
     * @return ?CatalogQueryExact
     */
    public function getExactQuery(): ?CatalogQueryExact
    {
        return $this->exactQuery;
    }

    /**
     * @param ?CatalogQueryExact $value
     */
    public function setExactQuery(?CatalogQueryExact $value = null): self
    {
        $this->exactQuery = $value;
        return $this;
    }

    /**
     * @return ?CatalogQuerySet
     */
    public function getSetQuery(): ?CatalogQuerySet
    {
        return $this->setQuery;
    }

    /**
     * @param ?CatalogQuerySet $value
     */
    public function setSetQuery(?CatalogQuerySet $value = null): self
    {
        $this->setQuery = $value;
        return $this;
    }

    /**
     * @return ?CatalogQueryPrefix
     */
    public function getPrefixQuery(): ?CatalogQueryPrefix
    {
        return $this->prefixQuery;
    }

    /**
     * @param ?CatalogQueryPrefix $value
     */
    public function setPrefixQuery(?CatalogQueryPrefix $value = null): self
    {
        $this->prefixQuery = $value;
        return $this;
    }

    /**
     * @return ?CatalogQueryRange
     */
    public function getRangeQuery(): ?CatalogQueryRange
    {
        return $this->rangeQuery;
    }

    /**
     * @param ?CatalogQueryRange $value
     */
    public function setRangeQuery(?CatalogQueryRange $value = null): self
    {
        $this->rangeQuery = $value;
        return $this;
    }

    /**
     * @return ?CatalogQueryText
     */
    public function getTextQuery(): ?CatalogQueryText
    {
        return $this->textQuery;
    }

    /**
     * @param ?CatalogQueryText $value
     */
    public function setTextQuery(?CatalogQueryText $value = null): self
    {
        $this->textQuery = $value;
        return $this;
    }

    /**
     * @return ?CatalogQueryItemsForTax
     */
    public function getItemsForTaxQuery(): ?CatalogQueryItemsForTax
    {
        return $this->itemsForTaxQuery;
    }

    /**
     * @param ?CatalogQueryItemsForTax $value
     */
    public function setItemsForTaxQuery(?CatalogQueryItemsForTax $value = null): self
    {
        $this->itemsForTaxQuery = $value;
        return $this;
    }

    /**
     * @return ?CatalogQueryItemsForModifierList
     */
    public function getItemsForModifierListQuery(): ?CatalogQueryItemsForModifierList
    {
        return $this->itemsForModifierListQuery;
    }

    /**
     * @param ?CatalogQueryItemsForModifierList $value
     */
    public function setItemsForModifierListQuery(?CatalogQueryItemsForModifierList $value = null): self
    {
        $this->itemsForModifierListQuery = $value;
        return $this;
    }

    /**
     * @return ?CatalogQueryItemsForItemOptions
     */
    public function getItemsForItemOptionsQuery(): ?CatalogQueryItemsForItemOptions
    {
        return $this->itemsForItemOptionsQuery;
    }

    /**
     * @param ?CatalogQueryItemsForItemOptions $value
     */
    public function setItemsForItemOptionsQuery(?CatalogQueryItemsForItemOptions $value = null): self
    {
        $this->itemsForItemOptionsQuery = $value;
        return $this;
    }

    /**
     * @return ?CatalogQueryItemVariationsForItemOptionValues
     */
    public function getItemVariationsForItemOptionValuesQuery(): ?CatalogQueryItemVariationsForItemOptionValues
    {
        return $this->itemVariationsForItemOptionValuesQuery;
    }

    /**
     * @param ?CatalogQueryItemVariationsForItemOptionValues $value
     */
    public function setItemVariationsForItemOptionValuesQuery(?CatalogQueryItemVariationsForItemOptionValues $value = null): self
    {
        $this->itemVariationsForItemOptionValuesQuery = $value;
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
