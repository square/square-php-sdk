<?php

declare(strict_types=1);

namespace Square\Models;

class SearchCatalogObjectsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var string[]|null
     */
    private $objectTypes;

    /**
     * @var bool|null
     */
    private $includeDeletedObjects;

    /**
     * @var bool|null
     */
    private $includeRelatedObjects;

    /**
     * @var string|null
     */
    private $beginTime;

    /**
     * @var CatalogQuery|null
     */
    private $query;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * Returns Cursor.
     *
     * The pagination cursor returned in the previous response. Leave unset for an initial request.
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The pagination cursor returned in the previous response. Leave unset for an initial request.
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Object Types.
     *
     * The desired set of object types to appear in the search results.
     * The legal values are taken from the CatalogObjectType enum: `"ITEM"`, `"ITEM_VARIATION"`,
     * `"CATEGORY"`,
     * `"DISCOUNT"`, `"TAX"`, `"MODIFIER"`, or `"MODIFIER_LIST"`.
     * See [CatalogObjectType](#type-catalogobjecttype) for possible values
     *
     * @return string[]|null
     */
    public function getObjectTypes(): ?array
    {
        return $this->objectTypes;
    }

    /**
     * Sets Object Types.
     *
     * The desired set of object types to appear in the search results.
     * The legal values are taken from the CatalogObjectType enum: `"ITEM"`, `"ITEM_VARIATION"`,
     * `"CATEGORY"`,
     * `"DISCOUNT"`, `"TAX"`, `"MODIFIER"`, or `"MODIFIER_LIST"`.
     * See [CatalogObjectType](#type-catalogobjecttype) for possible values
     *
     * @maps object_types
     *
     * @param string[]|null $objectTypes
     */
    public function setObjectTypes(?array $objectTypes): void
    {
        $this->objectTypes = $objectTypes;
    }

    /**
     * Returns Include Deleted Objects.
     *
     * If `true`, deleted objects will be included in the results. Deleted objects will have their
     * `is_deleted` field set to `true`.
     */
    public function getIncludeDeletedObjects(): ?bool
    {
        return $this->includeDeletedObjects;
    }

    /**
     * Sets Include Deleted Objects.
     *
     * If `true`, deleted objects will be included in the results. Deleted objects will have their
     * `is_deleted` field set to `true`.
     *
     * @maps include_deleted_objects
     */
    public function setIncludeDeletedObjects(?bool $includeDeletedObjects): void
    {
        $this->includeDeletedObjects = $includeDeletedObjects;
    }

    /**
     * Returns Include Related Objects.
     *
     * If `true`, the response will include additional objects that are related to the
     * requested object, as follows:
     *
     * If a CatalogItem is returned in the object field of the response,
     * its associated CatalogCategory, CatalogTax objects,
     * CatalogImage objects and CatalogModifierList objects
     * will be included in the `related_objects` field of the response.
     *
     * If a CatalogItemVariation is returned in the object field of the
     * response, its parent CatalogItem will be included in the `related_objects` field of
     * the response.
     */
    public function getIncludeRelatedObjects(): ?bool
    {
        return $this->includeRelatedObjects;
    }

    /**
     * Sets Include Related Objects.
     *
     * If `true`, the response will include additional objects that are related to the
     * requested object, as follows:
     *
     * If a CatalogItem is returned in the object field of the response,
     * its associated CatalogCategory, CatalogTax objects,
     * CatalogImage objects and CatalogModifierList objects
     * will be included in the `related_objects` field of the response.
     *
     * If a CatalogItemVariation is returned in the object field of the
     * response, its parent CatalogItem will be included in the `related_objects` field of
     * the response.
     *
     * @maps include_related_objects
     */
    public function setIncludeRelatedObjects(?bool $includeRelatedObjects): void
    {
        $this->includeRelatedObjects = $includeRelatedObjects;
    }

    /**
     * Returns Begin Time.
     *
     * Return objects modified after this [timestamp](https://developer.squareup.com/docs/build-
     * basics/working-with-dates), in RFC 3339
     * format, e.g., `2016-09-04T23:59:33.123Z`. The timestamp is exclusive - objects with a
     * timestamp equal to `begin_time` will not be included in the response.
     */
    public function getBeginTime(): ?string
    {
        return $this->beginTime;
    }

    /**
     * Sets Begin Time.
     *
     * Return objects modified after this [timestamp](https://developer.squareup.com/docs/build-
     * basics/working-with-dates), in RFC 3339
     * format, e.g., `2016-09-04T23:59:33.123Z`. The timestamp is exclusive - objects with a
     * timestamp equal to `begin_time` will not be included in the response.
     *
     * @maps begin_time
     */
    public function setBeginTime(?string $beginTime): void
    {
        $this->beginTime = $beginTime;
    }

    /**
     * Returns Query.
     *
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
    public function getQuery(): ?CatalogQuery
    {
        return $this->query;
    }

    /**
     * Sets Query.
     *
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
     *
     * @maps query
     */
    public function setQuery(?CatalogQuery $query): void
    {
        $this->query = $query;
    }

    /**
     * Returns Limit.
     *
     * A limit on the number of results to be returned in a single page. The limit is advisory -
     * the implementation may return more or fewer results. If the supplied limit is negative, zero, or
     * is higher than the maximum limit of 1,000, it will be ignored.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * A limit on the number of results to be returned in a single page. The limit is advisory -
     * the implementation may return more or fewer results. If the supplied limit is negative, zero, or
     * is higher than the maximum limit of 1,000, it will be ignored.
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['cursor']                = $this->cursor;
        $json['object_types']          = $this->objectTypes;
        $json['include_deleted_objects'] = $this->includeDeletedObjects;
        $json['include_related_objects'] = $this->includeRelatedObjects;
        $json['begin_time']            = $this->beginTime;
        $json['query']                 = $this->query;
        $json['limit']                 = $this->limit;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
