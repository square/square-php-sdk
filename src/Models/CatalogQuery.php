<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A query to be applied to a `SearchCatalogObjectsRequest`.
 * Only one query field may be present.
 *
 * Where an attribute name is required, it should be specified as the name of any field
 * marked "searchable" from the structured data types for the desired result object type(s)
 * (`CatalogItem`, `CatalogItemVariation`, `CatalogCategory`, `CatalogTax`,
 * `CatalogDiscount`, `CatalogModifierList`, `CatalogModifier`).
 *
 * For example, a query that should return Items may specify attribute names from
 * any of the searchable fields of the `CatalogItem` data type, namely
 * `"name"`, `"description"`, and `"abbreviation"`.
 */
class CatalogQuery implements \JsonSerializable
{
    /**
     * @var CatalogQuerySortedAttribute|null
     */
    private $sortedAttributeQuery;

    /**
     * @var CatalogQueryExact|null
     */
    private $exactQuery;

    /**
     * @var CatalogQueryPrefix|null
     */
    private $prefixQuery;

    /**
     * @var CatalogQueryRange|null
     */
    private $rangeQuery;

    /**
     * @var CatalogQueryText|null
     */
    private $textQuery;

    /**
     * @var CatalogQueryItemsForTax|null
     */
    private $itemsForTaxQuery;

    /**
     * @var CatalogQueryItemsForModifierList|null
     */
    private $itemsForModifierListQuery;

    /**
     * @var CatalogQueryItemsForItemOptions|null
     */
    private $itemsForItemOptionsQuery;

    /**
     * @var CatalogQueryItemVariationsForItemOptionValues|null
     */
    private $itemVariationsForItemOptionValuesQuery;

    /**
     * Returns Sorted Attribute Query.
     */
    public function getSortedAttributeQuery(): ?CatalogQuerySortedAttribute
    {
        return $this->sortedAttributeQuery;
    }

    /**
     * Sets Sorted Attribute Query.
     *
     * @maps sorted_attribute_query
     */
    public function setSortedAttributeQuery(?CatalogQuerySortedAttribute $sortedAttributeQuery): void
    {
        $this->sortedAttributeQuery = $sortedAttributeQuery;
    }

    /**
     * Returns Exact Query.
     */
    public function getExactQuery(): ?CatalogQueryExact
    {
        return $this->exactQuery;
    }

    /**
     * Sets Exact Query.
     *
     * @maps exact_query
     */
    public function setExactQuery(?CatalogQueryExact $exactQuery): void
    {
        $this->exactQuery = $exactQuery;
    }

    /**
     * Returns Prefix Query.
     */
    public function getPrefixQuery(): ?CatalogQueryPrefix
    {
        return $this->prefixQuery;
    }

    /**
     * Sets Prefix Query.
     *
     * @maps prefix_query
     */
    public function setPrefixQuery(?CatalogQueryPrefix $prefixQuery): void
    {
        $this->prefixQuery = $prefixQuery;
    }

    /**
     * Returns Range Query.
     */
    public function getRangeQuery(): ?CatalogQueryRange
    {
        return $this->rangeQuery;
    }

    /**
     * Sets Range Query.
     *
     * @maps range_query
     */
    public function setRangeQuery(?CatalogQueryRange $rangeQuery): void
    {
        $this->rangeQuery = $rangeQuery;
    }

    /**
     * Returns Text Query.
     */
    public function getTextQuery(): ?CatalogQueryText
    {
        return $this->textQuery;
    }

    /**
     * Sets Text Query.
     *
     * @maps text_query
     */
    public function setTextQuery(?CatalogQueryText $textQuery): void
    {
        $this->textQuery = $textQuery;
    }

    /**
     * Returns Items for Tax Query.
     */
    public function getItemsForTaxQuery(): ?CatalogQueryItemsForTax
    {
        return $this->itemsForTaxQuery;
    }

    /**
     * Sets Items for Tax Query.
     *
     * @maps items_for_tax_query
     */
    public function setItemsForTaxQuery(?CatalogQueryItemsForTax $itemsForTaxQuery): void
    {
        $this->itemsForTaxQuery = $itemsForTaxQuery;
    }

    /**
     * Returns Items for Modifier List Query.
     */
    public function getItemsForModifierListQuery(): ?CatalogQueryItemsForModifierList
    {
        return $this->itemsForModifierListQuery;
    }

    /**
     * Sets Items for Modifier List Query.
     *
     * @maps items_for_modifier_list_query
     */
    public function setItemsForModifierListQuery(?CatalogQueryItemsForModifierList $itemsForModifierListQuery): void
    {
        $this->itemsForModifierListQuery = $itemsForModifierListQuery;
    }

    /**
     * Returns Items for Item Options Query.
     */
    public function getItemsForItemOptionsQuery(): ?CatalogQueryItemsForItemOptions
    {
        return $this->itemsForItemOptionsQuery;
    }

    /**
     * Sets Items for Item Options Query.
     *
     * @maps items_for_item_options_query
     */
    public function setItemsForItemOptionsQuery(?CatalogQueryItemsForItemOptions $itemsForItemOptionsQuery): void
    {
        $this->itemsForItemOptionsQuery = $itemsForItemOptionsQuery;
    }

    /**
     * Returns Item Variations for Item Option Values Query.
     */
    public function getItemVariationsForItemOptionValuesQuery(): ?CatalogQueryItemVariationsForItemOptionValues
    {
        return $this->itemVariationsForItemOptionValuesQuery;
    }

    /**
     * Sets Item Variations for Item Option Values Query.
     *
     * @maps item_variations_for_item_option_values_query
     */
    public function setItemVariationsForItemOptionValuesQuery(
        ?CatalogQueryItemVariationsForItemOptionValues $itemVariationsForItemOptionValuesQuery
    ): void {
        $this->itemVariationsForItemOptionValuesQuery = $itemVariationsForItemOptionValuesQuery;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['sorted_attribute_query']                 = $this->sortedAttributeQuery;
        $json['exact_query']                            = $this->exactQuery;
        $json['prefix_query']                           = $this->prefixQuery;
        $json['range_query']                            = $this->rangeQuery;
        $json['text_query']                             = $this->textQuery;
        $json['items_for_tax_query']                    = $this->itemsForTaxQuery;
        $json['items_for_modifier_list_query']          = $this->itemsForModifierListQuery;
        $json['items_for_item_options_query']           = $this->itemsForItemOptionsQuery;
        $json['item_variations_for_item_option_values_query'] = $this->itemVariationsForItemOptionValuesQuery;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
