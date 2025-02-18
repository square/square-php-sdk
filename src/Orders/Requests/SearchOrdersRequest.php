<?php

namespace Square\Orders\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;
use Square\Types\SearchOrdersQuery;

class SearchOrdersRequest extends JsonSerializableType
{
    /**
     * The location IDs for the orders to query. All locations must belong to
     * the same merchant.
     *
     * Max: 10 location IDs.
     *
     * @var ?array<string> $locationIds
     */
    #[JsonProperty('location_ids'), ArrayType(['string'])]
    private ?array $locationIds;

    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for your original query.
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * Query conditions used to filter or sort the results. Note that when
     * retrieving additional pages using a cursor, you must use the original query.
     *
     * @var ?SearchOrdersQuery $query
     */
    #[JsonProperty('query')]
    private ?SearchOrdersQuery $query;

    /**
     * The maximum number of results to be returned in a single page.
     *
     * Default: `500`
     * Max: `1000`
     *
     * @var ?int $limit
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * A Boolean that controls the format of the search results. If `true`,
     * `SearchOrders` returns [OrderEntry](entity:OrderEntry) objects. If `false`, `SearchOrders`
     * returns complete order objects.
     *
     * Default: `false`.
     *
     * @var ?bool $returnEntries
     */
    #[JsonProperty('return_entries')]
    private ?bool $returnEntries;

    /**
     * @param array{
     *   locationIds?: ?array<string>,
     *   cursor?: ?string,
     *   query?: ?SearchOrdersQuery,
     *   limit?: ?int,
     *   returnEntries?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationIds = $values['locationIds'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->returnEntries = $values['returnEntries'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getLocationIds(): ?array
    {
        return $this->locationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setLocationIds(?array $value = null): self
    {
        $this->locationIds = $value;
        return $this;
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
     * @return ?SearchOrdersQuery
     */
    public function getQuery(): ?SearchOrdersQuery
    {
        return $this->query;
    }

    /**
     * @param ?SearchOrdersQuery $value
     */
    public function setQuery(?SearchOrdersQuery $value = null): self
    {
        $this->query = $value;
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
     * @return ?bool
     */
    public function getReturnEntries(): ?bool
    {
        return $this->returnEntries;
    }

    /**
     * @param ?bool $value
     */
    public function setReturnEntries(?bool $value = null): self
    {
        $this->returnEntries = $value;
        return $this;
    }
}
