<?php

declare(strict_types=1);

namespace Square\Models;

class CatalogQueryFilteredItems implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $textFilter;

    /**
     * @var bool|null
     */
    private $searchVendorCode;

    /**
     * @var string[]|null
     */
    private $categoryIds;

    /**
     * @var string[]|null
     */
    private $stockLevels;

    /**
     * @var string[]|null
     */
    private $enabledLocationIds;

    /**
     * @var string[]|null
     */
    private $vendorIds;

    /**
     * @var string[]|null
     */
    private $productTypes;

    /**
     * @var CatalogQueryFilteredItemsCustomAttributeFilter[]|null
     */
    private $customAttributeFilters;

    /**
     * @var string[]|null
     */
    private $doesNotExist;

    /**
     * @var string|null
     */
    private $sortOrder;

    /**
     * Returns Text Filter.
     */
    public function getTextFilter(): ?string
    {
        return $this->textFilter;
    }

    /**
     * Sets Text Filter.
     *
     * @maps text_filter
     */
    public function setTextFilter(?string $textFilter): void
    {
        $this->textFilter = $textFilter;
    }

    /**
     * Returns Search Vendor Code.
     */
    public function getSearchVendorCode(): ?bool
    {
        return $this->searchVendorCode;
    }

    /**
     * Sets Search Vendor Code.
     *
     * @maps search_vendor_code
     */
    public function setSearchVendorCode(?bool $searchVendorCode): void
    {
        $this->searchVendorCode = $searchVendorCode;
    }

    /**
     * Returns Category Ids.
     *
     * @return string[]|null
     */
    public function getCategoryIds(): ?array
    {
        return $this->categoryIds;
    }

    /**
     * Sets Category Ids.
     *
     * @maps category_ids
     *
     * @param string[]|null $categoryIds
     */
    public function setCategoryIds(?array $categoryIds): void
    {
        $this->categoryIds = $categoryIds;
    }

    /**
     * Returns Stock Levels.
     *
     * See [CatalogQueryFilteredItemsStockLevel](#type-catalogqueryfiltereditemsstocklevel) for possible
     * values
     *
     * @return string[]|null
     */
    public function getStockLevels(): ?array
    {
        return $this->stockLevels;
    }

    /**
     * Sets Stock Levels.
     *
     * See [CatalogQueryFilteredItemsStockLevel](#type-catalogqueryfiltereditemsstocklevel) for possible
     * values
     *
     * @maps stock_levels
     *
     * @param string[]|null $stockLevels
     */
    public function setStockLevels(?array $stockLevels): void
    {
        $this->stockLevels = $stockLevels;
    }

    /**
     * Returns Enabled Location Ids.
     *
     * @return string[]|null
     */
    public function getEnabledLocationIds(): ?array
    {
        return $this->enabledLocationIds;
    }

    /**
     * Sets Enabled Location Ids.
     *
     * @maps enabled_location_ids
     *
     * @param string[]|null $enabledLocationIds
     */
    public function setEnabledLocationIds(?array $enabledLocationIds): void
    {
        $this->enabledLocationIds = $enabledLocationIds;
    }

    /**
     * Returns Vendor Ids.
     *
     * @return string[]|null
     */
    public function getVendorIds(): ?array
    {
        return $this->vendorIds;
    }

    /**
     * Sets Vendor Ids.
     *
     * @maps vendor_ids
     *
     * @param string[]|null $vendorIds
     */
    public function setVendorIds(?array $vendorIds): void
    {
        $this->vendorIds = $vendorIds;
    }

    /**
     * Returns Product Types.
     *
     * See [CatalogItemProductType](#type-catalogitemproducttype) for possible values
     *
     * @return string[]|null
     */
    public function getProductTypes(): ?array
    {
        return $this->productTypes;
    }

    /**
     * Sets Product Types.
     *
     * See [CatalogItemProductType](#type-catalogitemproducttype) for possible values
     *
     * @maps product_types
     *
     * @param string[]|null $productTypes
     */
    public function setProductTypes(?array $productTypes): void
    {
        $this->productTypes = $productTypes;
    }

    /**
     * Returns Custom Attribute Filters.
     *
     * @return CatalogQueryFilteredItemsCustomAttributeFilter[]|null
     */
    public function getCustomAttributeFilters(): ?array
    {
        return $this->customAttributeFilters;
    }

    /**
     * Sets Custom Attribute Filters.
     *
     * @maps custom_attribute_filters
     *
     * @param CatalogQueryFilteredItemsCustomAttributeFilter[]|null $customAttributeFilters
     */
    public function setCustomAttributeFilters(?array $customAttributeFilters): void
    {
        $this->customAttributeFilters = $customAttributeFilters;
    }

    /**
     * Returns Does Not Exist.
     *
     * See [CatalogQueryFilteredItemsNullableAttribute](#type-catalogqueryfiltereditemsnullableattribute)
     * for possible values
     *
     * @return string[]|null
     */
    public function getDoesNotExist(): ?array
    {
        return $this->doesNotExist;
    }

    /**
     * Sets Does Not Exist.
     *
     * See [CatalogQueryFilteredItemsNullableAttribute](#type-catalogqueryfiltereditemsnullableattribute)
     * for possible values
     *
     * @maps does_not_exist
     *
     * @param string[]|null $doesNotExist
     */
    public function setDoesNotExist(?array $doesNotExist): void
    {
        $this->doesNotExist = $doesNotExist;
    }

    /**
     * Returns Sort Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * Sets Sort Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     *
     * @maps sort_order
     */
    public function setSortOrder(?string $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['text_filter']            = $this->textFilter;
        $json['search_vendor_code']     = $this->searchVendorCode;
        $json['category_ids']           = $this->categoryIds;
        $json['stock_levels']           = $this->stockLevels;
        $json['enabled_location_ids']   = $this->enabledLocationIds;
        $json['vendor_ids']             = $this->vendorIds;
        $json['product_types']          = $this->productTypes;
        $json['custom_attribute_filters'] = $this->customAttributeFilters;
        $json['does_not_exist']         = $this->doesNotExist;
        $json['sort_order']             = $this->sortOrder;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
