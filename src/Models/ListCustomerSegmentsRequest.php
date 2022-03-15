<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

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
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-
     * patterns/pagination).
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
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-
     * patterns/pagination).
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
     * If the specified limit is less than 1 or greater than 50, Square returns a `400 VALUE_TOO_LOW` or
     * `400 VALUE_TOO_HIGH` error. The default value is 50.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-
     * patterns/pagination).
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
     * If the specified limit is less than 1 or greater than 50, Square returns a `400 VALUE_TOO_LOW` or
     * `400 VALUE_TOO_HIGH` error. The default value is 50.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-
     * patterns/pagination).
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
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->cursor)) {
            $json['cursor'] = $this->cursor;
        }
        if (isset($this->limit)) {
            $json['limit']  = $this->limit;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
