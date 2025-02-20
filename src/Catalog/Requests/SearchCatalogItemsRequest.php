<?php

namespace Square\Catalog\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;
use Square\Types\SearchCatalogItemsRequestStockLevel;
use Square\Types\SortOrder;
use Square\Types\CatalogItemProductType;
use Square\Types\CustomAttributeFilter;
use Square\Types\ArchivedState;

class SearchCatalogItemsRequest extends JsonSerializableType
{
    /**
     * The text filter expression to return items or item variations containing specified text in
     * the `name`, `description`, or `abbreviation` attribute value of an item, or in
     * the `name`, `sku`, or `upc` attribute value of an item variation.
     *
     * @var ?string $textFilter
     */
    #[JsonProperty('text_filter')]
    private ?string $textFilter;

    /**
     * @var ?array<string> $categoryIds The category id query expression to return items containing the specified category IDs.
     */
    #[JsonProperty('category_ids'), ArrayType(['string'])]
    private ?array $categoryIds;

    /**
     * The stock-level query expression to return item variations with the specified stock levels.
     * See [SearchCatalogItemsRequestStockLevel](#type-searchcatalogitemsrequeststocklevel) for possible values
     *
     * @var ?array<value-of<SearchCatalogItemsRequestStockLevel>> $stockLevels
     */
    #[JsonProperty('stock_levels'), ArrayType(['string'])]
    private ?array $stockLevels;

    /**
     * @var ?array<string> $enabledLocationIds The enabled-location query expression to return items and item variations having specified enabled locations.
     */
    #[JsonProperty('enabled_location_ids'), ArrayType(['string'])]
    private ?array $enabledLocationIds;

    /**
     * @var ?string $cursor The pagination token, returned in the previous response, used to fetch the next batch of pending results.
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?int $limit The maximum number of results to return per page. The default value is 100.
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * The order to sort the results by item names. The default sort order is ascending (`ASC`).
     * See [SortOrder](#type-sortorder) for possible values
     *
     * @var ?value-of<SortOrder> $sortOrder
     */
    #[JsonProperty('sort_order')]
    private ?string $sortOrder;

    /**
     * @var ?array<value-of<CatalogItemProductType>> $productTypes The product types query expression to return items or item variations having the specified product types.
     */
    #[JsonProperty('product_types'), ArrayType(['string'])]
    private ?array $productTypes;

    /**
     * The customer-attribute filter to return items or item variations matching the specified
     * custom attribute expressions. A maximum number of 10 custom attribute expressions are supported in
     * a single call to the [SearchCatalogItems](api-endpoint:Catalog-SearchCatalogItems) endpoint.
     *
     * @var ?array<CustomAttributeFilter> $customAttributeFilters
     */
    #[JsonProperty('custom_attribute_filters'), ArrayType([CustomAttributeFilter::class])]
    private ?array $customAttributeFilters;

    /**
     * @var ?value-of<ArchivedState> $archivedState The query filter to return not archived (`ARCHIVED_STATE_NOT_ARCHIVED`), archived (`ARCHIVED_STATE_ARCHIVED`), or either type (`ARCHIVED_STATE_ALL`) of items.
     */
    #[JsonProperty('archived_state')]
    private ?string $archivedState;

    /**
     * @param array{
     *   textFilter?: ?string,
     *   categoryIds?: ?array<string>,
     *   stockLevels?: ?array<value-of<SearchCatalogItemsRequestStockLevel>>,
     *   enabledLocationIds?: ?array<string>,
     *   cursor?: ?string,
     *   limit?: ?int,
     *   sortOrder?: ?value-of<SortOrder>,
     *   productTypes?: ?array<value-of<CatalogItemProductType>>,
     *   customAttributeFilters?: ?array<CustomAttributeFilter>,
     *   archivedState?: ?value-of<ArchivedState>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->textFilter = $values['textFilter'] ?? null;
        $this->categoryIds = $values['categoryIds'] ?? null;
        $this->stockLevels = $values['stockLevels'] ?? null;
        $this->enabledLocationIds = $values['enabledLocationIds'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->productTypes = $values['productTypes'] ?? null;
        $this->customAttributeFilters = $values['customAttributeFilters'] ?? null;
        $this->archivedState = $values['archivedState'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getTextFilter(): ?string
    {
        return $this->textFilter;
    }

    /**
     * @param ?string $value
     */
    public function setTextFilter(?string $value = null): self
    {
        $this->textFilter = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getCategoryIds(): ?array
    {
        return $this->categoryIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setCategoryIds(?array $value = null): self
    {
        $this->categoryIds = $value;
        return $this;
    }

    /**
     * @return ?array<value-of<SearchCatalogItemsRequestStockLevel>>
     */
    public function getStockLevels(): ?array
    {
        return $this->stockLevels;
    }

    /**
     * @param ?array<value-of<SearchCatalogItemsRequestStockLevel>> $value
     */
    public function setStockLevels(?array $value = null): self
    {
        $this->stockLevels = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getEnabledLocationIds(): ?array
    {
        return $this->enabledLocationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setEnabledLocationIds(?array $value = null): self
    {
        $this->enabledLocationIds = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param ?int $value
     */
    public function setLimit(?int $value = null): self
    {
        $this->limit = $value;
        return $this;
    }

    /**
     * @return ?value-of<SortOrder>
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * @param ?value-of<SortOrder> $value
     */
    public function setSortOrder(?string $value = null): self
    {
        $this->sortOrder = $value;
        return $this;
    }

    /**
     * @return ?array<value-of<CatalogItemProductType>>
     */
    public function getProductTypes(): ?array
    {
        return $this->productTypes;
    }

    /**
     * @param ?array<value-of<CatalogItemProductType>> $value
     */
    public function setProductTypes(?array $value = null): self
    {
        $this->productTypes = $value;
        return $this;
    }

    /**
     * @return ?array<CustomAttributeFilter>
     */
    public function getCustomAttributeFilters(): ?array
    {
        return $this->customAttributeFilters;
    }

    /**
     * @param ?array<CustomAttributeFilter> $value
     */
    public function setCustomAttributeFilters(?array $value = null): self
    {
        $this->customAttributeFilters = $value;
        return $this;
    }

    /**
     * @return ?value-of<ArchivedState>
     */
    public function getArchivedState(): ?string
    {
        return $this->archivedState;
    }

    /**
     * @param ?value-of<ArchivedState> $value
     */
    public function setArchivedState(?string $value = null): self
    {
        $this->archivedState = $value;
        return $this;
    }
}
