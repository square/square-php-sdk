<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields included in the request body for the
 * SearchCustomers endpoint.
 */
class SearchCustomersRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var CustomerQuery|null
     */
    private $query;

    /**
     * Returns Cursor.
     *
     * Include the pagination cursor in subsequent calls to this endpoint to retrieve
     * the next set of results associated with the original query.
     *
     * See the [Pagination guide](https://developer.squareup.com/docs/working-with-apis/pagination) for
     * more information.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Include the pagination cursor in subsequent calls to this endpoint to retrieve
     * the next set of results associated with the original query.
     *
     * See the [Pagination guide](https://developer.squareup.com/docs/working-with-apis/pagination) for
     * more information.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Limit.
     *
     * A limit on the number of results to be returned in a single page.
     * The limit is advisory - the implementation may return more or fewer results.
     * If the supplied limit is negative, zero, or is higher than the maximum limit
     * of 100, it will be ignored.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * A limit on the number of results to be returned in a single page.
     * The limit is advisory - the implementation may return more or fewer results.
     * If the supplied limit is negative, zero, or is higher than the maximum limit
     * of 100, it will be ignored.
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Returns Query.
     *
     * Represents a query (including filtering criteria, sorting criteria, or both) used to search
     * for customer profiles.
     */
    public function getQuery(): ?CustomerQuery
    {
        return $this->query;
    }

    /**
     * Sets Query.
     *
     * Represents a query (including filtering criteria, sorting criteria, or both) used to search
     * for customer profiles.
     *
     * @maps query
     */
    public function setQuery(?CustomerQuery $query): void
    {
        $this->query = $query;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['cursor'] = $this->cursor;
        $json['limit']  = $this->limit;
        $json['query']  = $this->query;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
