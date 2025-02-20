<?php

namespace Square\Customers\Segments\Requests;

use Square\Core\Json\JsonSerializableType;

class ListSegmentsRequest extends JsonSerializableType
{
    /**
     * A pagination cursor returned by previous calls to `ListCustomerSegments`.
     * This cursor is used to retrieve the next set of query results.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * The maximum number of results to return in a single page. This limit is advisory. The response might contain more or fewer results.
     * If the specified limit is less than 1 or greater than 50, Square returns a `400 VALUE_TOO_LOW` or `400 VALUE_TOO_HIGH` error. The default value is 50.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * @param array{
     *   cursor?: ?string,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
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
}
