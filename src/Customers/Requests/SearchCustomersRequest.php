<?php

namespace Square\Customers\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\CustomerQuery;

class SearchCustomersRequest extends JsonSerializableType
{
    /**
     * Include the pagination cursor in subsequent calls to this endpoint to retrieve
     * the next set of results associated with the original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * The maximum number of results to return in a single page. This limit is advisory. The response might contain more or fewer results.
     * If the specified limit is invalid, Square returns a `400 VALUE_TOO_LOW` or `400 VALUE_TOO_HIGH` error. The default value is 100.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?int $limit
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * The filtering and sorting criteria for the search request. If a query is not specified,
     * Square returns all customer profiles ordered alphabetically by `given_name` and `family_name`.
     *
     * @var ?CustomerQuery $query
     */
    #[JsonProperty('query')]
    private ?CustomerQuery $query;

    /**
     * Indicates whether to return the total count of matching customers in the `count` field of the response.
     *
     * The default value is `false`.
     *
     * @var ?bool $count
     */
    #[JsonProperty('count')]
    private ?bool $count;

    /**
     * @param array{
     *   cursor?: ?string,
     *   limit?: ?int,
     *   query?: ?CustomerQuery,
     *   count?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->count = $values['count'] ?? null;
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

    /**
     * @return ?CustomerQuery
     */
    public function getQuery(): ?CustomerQuery
    {
        return $this->query;
    }

    /**
     * @param ?CustomerQuery $value
     */
    public function setQuery(?CustomerQuery $value = null): self
    {
        $this->query = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getCount(): ?bool
    {
        return $this->count;
    }

    /**
     * @param ?bool $value
     */
    public function setCount(?bool $value = null): self
    {
        $this->count = $value;
        return $this;
    }
}
