<?php

namespace Square\Catalog\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\CatalogObjectType;
use Square\Core\Types\ArrayType;
use Square\Types\CatalogQuery;

class SearchCatalogObjectsRequest extends JsonSerializableType
{
    /**
     * The pagination cursor returned in the previous response. Leave unset for an initial request.
     * See [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination) for more information.
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * The desired set of object types to appear in the search results.
     *
     * If this is unspecified, the operation returns objects of all the top level types at the version
     * of the Square API used to make the request. Object types that are nested onto other object types
     * are not included in the defaults.
     *
     * At the current API version the default object types are:
     * ITEM, CATEGORY, TAX, DISCOUNT, MODIFIER_LIST,
     * PRICING_RULE, PRODUCT_SET, TIME_PERIOD, MEASUREMENT_UNIT,
     * SUBSCRIPTION_PLAN, ITEM_OPTION, CUSTOM_ATTRIBUTE_DEFINITION, QUICK_AMOUNT_SETTINGS.
     *
     * Note that if you wish for the query to return objects belonging to nested types (i.e., COMPONENT, IMAGE,
     * ITEM_OPTION_VAL, ITEM_VARIATION, or MODIFIER), you must explicitly include all the types of interest
     * in this field.
     *
     * @var ?array<value-of<CatalogObjectType>> $objectTypes
     */
    #[JsonProperty('object_types'), ArrayType(['string'])]
    private ?array $objectTypes;

    /**
     * @var ?bool $includeDeletedObjects If `true`, deleted objects will be included in the results. Defaults to `false`. Deleted objects will have their `is_deleted` field set to `true`. If `include_deleted_objects` is `true`, then the `include_category_path_to_root` request parameter must be `false`. Both properties cannot be `true` at the same time.
     */
    #[JsonProperty('include_deleted_objects')]
    private ?bool $includeDeletedObjects;

    /**
     * If `true`, the response will include additional objects that are related to the
     * requested objects. Related objects are objects that are referenced by object ID by the objects
     * in the response. This is helpful if the objects are being fetched for immediate display to a user.
     * This process only goes one level deep. Objects referenced by the related objects will not be included.
     * For example:
     *
     * If the `objects` field of the response contains a CatalogItem, its associated
     * CatalogCategory objects, CatalogTax objects, CatalogImage objects and
     * CatalogModifierLists will be returned in the `related_objects` field of the
     * response. If the `objects` field of the response contains a CatalogItemVariation,
     * its parent CatalogItem will be returned in the `related_objects` field of
     * the response.
     *
     * Default value: `false`
     *
     * @var ?bool $includeRelatedObjects
     */
    #[JsonProperty('include_related_objects')]
    private ?bool $includeRelatedObjects;

    /**
     * Return objects modified after this [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates), in RFC 3339
     * format, e.g., `2016-09-04T23:59:33.123Z`. The timestamp is exclusive - objects with a
     * timestamp equal to `begin_time` will not be included in the response.
     *
     * @var ?string $beginTime
     */
    #[JsonProperty('begin_time')]
    private ?string $beginTime;

    /**
     * @var ?CatalogQuery $query A query to be used to filter or sort the results. If no query is specified, the entire catalog will be returned.
     */
    #[JsonProperty('query')]
    private ?CatalogQuery $query;

    /**
     * A limit on the number of results to be returned in a single page. The limit is advisory -
     * the implementation may return more or fewer results. If the supplied limit is negative, zero, or
     * is higher than the maximum limit of 1,000, it will be ignored.
     *
     * @var ?int $limit
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * @var ?bool $includeCategoryPathToRoot Specifies whether or not to include the `path_to_root` list for each returned category instance. The `path_to_root` list consists of `CategoryPathToRootNode` objects and specifies the path that starts with the immediate parent category of the returned category and ends with its root category. If the returned category is a top-level category, the `path_to_root` list is empty and is not returned in the response payload. If `include_category_path_to_root` is `true`, then the `include_deleted_objects` request parameter must be `false`. Both properties cannot be `true` at the same time.
     */
    #[JsonProperty('include_category_path_to_root')]
    private ?bool $includeCategoryPathToRoot;

    /**
     * @param array{
     *   cursor?: ?string,
     *   objectTypes?: ?array<value-of<CatalogObjectType>>,
     *   includeDeletedObjects?: ?bool,
     *   includeRelatedObjects?: ?bool,
     *   beginTime?: ?string,
     *   query?: ?CatalogQuery,
     *   limit?: ?int,
     *   includeCategoryPathToRoot?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->objectTypes = $values['objectTypes'] ?? null;
        $this->includeDeletedObjects = $values['includeDeletedObjects'] ?? null;
        $this->includeRelatedObjects = $values['includeRelatedObjects'] ?? null;
        $this->beginTime = $values['beginTime'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->includeCategoryPathToRoot = $values['includeCategoryPathToRoot'] ?? null;
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
     * @return ?array<value-of<CatalogObjectType>>
     */
    public function getObjectTypes(): ?array
    {
        return $this->objectTypes;
    }

    /**
     * @param ?array<value-of<CatalogObjectType>> $value
     */
    public function setObjectTypes(?array $value = null): self
    {
        $this->objectTypes = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIncludeDeletedObjects(): ?bool
    {
        return $this->includeDeletedObjects;
    }

    /**
     * @param ?bool $value
     */
    public function setIncludeDeletedObjects(?bool $value = null): self
    {
        $this->includeDeletedObjects = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIncludeRelatedObjects(): ?bool
    {
        return $this->includeRelatedObjects;
    }

    /**
     * @param ?bool $value
     */
    public function setIncludeRelatedObjects(?bool $value = null): self
    {
        $this->includeRelatedObjects = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBeginTime(): ?string
    {
        return $this->beginTime;
    }

    /**
     * @param ?string $value
     */
    public function setBeginTime(?string $value = null): self
    {
        $this->beginTime = $value;
        return $this;
    }

    /**
     * @return ?CatalogQuery
     */
    public function getQuery(): ?CatalogQuery
    {
        return $this->query;
    }

    /**
     * @param ?CatalogQuery $value
     */
    public function setQuery(?CatalogQuery $value = null): self
    {
        $this->query = $value;
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
     * @return ?bool
     */
    public function getIncludeCategoryPathToRoot(): ?bool
    {
        return $this->includeCategoryPathToRoot;
    }

    /**
     * @param ?bool $value
     */
    public function setIncludeCategoryPathToRoot(?bool $value = null): self
    {
        $this->includeCategoryPathToRoot = $value;
        return $this;
    }
}
