<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the query parameters that can be included in a request to the
 * `ListCustomers` endpoint.
 */
class ListCustomersRequest implements \JsonSerializable
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
     * @var string|null
     */
    private $sortField;

    /**
     * @var string|null
     */
    private $sortOrder;

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for your original query.
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
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for your original query.
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
     * The limit is ignored if it is less than 1 or greater than 100. The default value is 100.
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
     * The limit is ignored if it is less than 1 or greater than 100. The default value is 100.
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
     * Returns Sort Field.
     *
     * Specifies customer attributes as the sort key to customer profiles returned from a search.
     */
    public function getSortField(): ?string
    {
        return $this->sortField;
    }

    /**
     * Sets Sort Field.
     *
     * Specifies customer attributes as the sort key to customer profiles returned from a search.
     *
     * @maps sort_field
     */
    public function setSortField(?string $sortField): void
    {
        $this->sortField = $sortField;
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
        if (isset($this->cursor)) {
            $json['cursor']     = $this->cursor;
        }
        if (isset($this->limit)) {
            $json['limit']      = $this->limit;
        }
        if (isset($this->sortField)) {
            $json['sort_field'] = $this->sortField;
        }
        if (isset($this->sortOrder)) {
            $json['sort_order'] = $this->sortOrder;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
