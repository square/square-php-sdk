<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the valid parameters for requests to __ListCustomerSegments__.
 */
class ListCustomerSegmentsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by previous calls to __ListCustomerSegments__.
     * Used to retrieve the next set of query results.
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
     * A pagination cursor returned by previous calls to __ListCustomerSegments__.
     * Used to retrieve the next set of query results.
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['cursor'] = $this->cursor;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
