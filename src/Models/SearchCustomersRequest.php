<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the request body of a request to the
 * `SearchCustomers` endpoint.
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
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
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
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
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
     * The maximum number of results to return in a single page. This limit is advisory. The response might
     * contain more or fewer results.
     * The limit is ignored if it is less than the minimum or greater than the maximum value. The default
     * value is 100.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum number of results to return in a single page. This limit is advisory. The response might
     * contain more or fewer results.
     * The limit is ignored if it is less than the minimum or greater than the maximum value. The default
     * value is 100.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
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
        if (isset($this->cursor)) {
            $json['cursor'] = $this->cursor;
        }
        if (isset($this->limit)) {
            $json['limit']  = $this->limit;
        }
        if (isset($this->query)) {
            $json['query']  = $this->query;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
