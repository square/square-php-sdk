<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The request does not have any required fields. When given no query criteria,
 * SearchOrders will return all results for all of the merchant’s locations. When fetching additional
 * pages using a `cursor`, the `query` must be equal to the `query` used to fetch the first page of
 * results.
 */
class SearchOrdersRequest implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $locationIds;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var SearchOrdersQuery|null
     */
    private $query;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var bool|null
     */
    private $returnEntries;

    /**
     * Returns Location Ids.
     *
     * The location IDs for the orders to query. All locations must belong to
     * the same merchant.
     *
     * Min: 1 location IDs.
     *
     * Max: 10 location IDs.
     *
     * @return string[]|null
     */
    public function getLocationIds(): ?array
    {
        return $this->locationIds;
    }

    /**
     * Sets Location Ids.
     *
     * The location IDs for the orders to query. All locations must belong to
     * the same merchant.
     *
     * Min: 1 location IDs.
     *
     * Max: 10 location IDs.
     *
     * @maps location_ids
     *
     * @param string[]|null $locationIds
     */
    public function setLocationIds(?array $locationIds): void
    {
        $this->locationIds = $locationIds;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Query.
     *
     * Contains query criteria for the search.
     */
    public function getQuery(): ?SearchOrdersQuery
    {
        return $this->query;
    }

    /**
     * Sets Query.
     *
     * Contains query criteria for the search.
     *
     * @maps query
     */
    public function setQuery(?SearchOrdersQuery $query): void
    {
        $this->query = $query;
    }

    /**
     * Returns Limit.
     *
     * Maximum number of results to be returned in a single page. It is
     * possible to receive fewer results than the specified limit on a given page.
     *
     * Default: `500`
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * Maximum number of results to be returned in a single page. It is
     * possible to receive fewer results than the specified limit on a given page.
     *
     * Default: `500`
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Returns Return Entries.
     *
     * Boolean that controls the format of the search results. If `true`,
     * SearchOrders will return [`OrderEntry`](#type-orderentry) objects. If `false`, SearchOrders
     * will return complete Order objects.
     *
     * Default: `false`.
     */
    public function getReturnEntries(): ?bool
    {
        return $this->returnEntries;
    }

    /**
     * Sets Return Entries.
     *
     * Boolean that controls the format of the search results. If `true`,
     * SearchOrders will return [`OrderEntry`](#type-orderentry) objects. If `false`, SearchOrders
     * will return complete Order objects.
     *
     * Default: `false`.
     *
     * @maps return_entries
     */
    public function setReturnEntries(?bool $returnEntries): void
    {
        $this->returnEntries = $returnEntries;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['location_ids']  = $this->locationIds;
        $json['cursor']        = $this->cursor;
        $json['query']         = $this->query;
        $json['limit']         = $this->limit;
        $json['return_entries'] = $this->returnEntries;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
