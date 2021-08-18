<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the valid parameters for requests to the `ListCustomerSegments` endpoint.
 */
class ListCustomerSegmentsRequest implements \JsonSerializable
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
     * Returns Cursor.
     *
     * A pagination cursor returned by previous calls to `ListCustomerSegments`.
     * This cursor is used to retrieve the next set of query results.
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
     * A pagination cursor returned by previous calls to `ListCustomerSegments`.
     * This cursor is used to retrieve the next set of query results.
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
     * The limit is ignored if it is less than 1 or greater than 50. The default value is 50.
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
     * The limit is ignored if it is less than 1 or greater than 50. The default value is 50.
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

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
