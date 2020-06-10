<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the query parameters that can be provided in a request to the
 * ListCustomers endpoint.
 */
class ListCustomersRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

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
     * Provide this to retrieve the next set of results for your original query.
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
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
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
        $json['cursor']    = $this->cursor;
        $json['sort_field'] = $this->sortField;
        $json['sort_order'] = $this->sortOrder;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
