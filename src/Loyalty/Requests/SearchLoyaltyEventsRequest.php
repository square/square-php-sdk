<?php

namespace Square\Loyalty\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\LoyaltyEventQuery;
use Square\Core\Json\JsonProperty;

class SearchLoyaltyEventsRequest extends JsonSerializableType
{
    /**
     * A set of one or more predefined query filters to apply when
     * searching for loyalty events. The endpoint performs a logical AND to
     * evaluate multiple filters and performs a logical OR on arrays
     * that specifies multiple field values.
     *
     * @var ?LoyaltyEventQuery $query
     */
    #[JsonProperty('query')]
    private ?LoyaltyEventQuery $query;

    /**
     * The maximum number of results to include in the response.
     * The last page might contain fewer events.
     * The default is 30 events.
     *
     * @var ?int $limit
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   query?: ?LoyaltyEventQuery,
     *   limit?: ?int,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->query = $values['query'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
    }

    /**
     * @return ?LoyaltyEventQuery
     */
    public function getQuery(): ?LoyaltyEventQuery
    {
        return $this->query;
    }

    /**
     * @param ?LoyaltyEventQuery $value
     */
    public function setQuery(?LoyaltyEventQuery $value = null): self
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
}
