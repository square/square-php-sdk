<?php

namespace Square\Events\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\SearchEventsQuery;

class SearchEventsRequest extends JsonSerializableType
{
    /**
     * A pagination cursor returned by a previous call to this endpoint. Provide this cursor to retrieve the next set of events for your original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * The maximum number of events to return in a single page. The response might contain fewer events. The default value is 100, which is also the maximum allowed value.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * Default: 100
     *
     * @var ?int $limit
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * @var ?SearchEventsQuery $query The filtering and sorting criteria for the search request. To retrieve additional pages using a cursor, you must use the original query.
     */
    #[JsonProperty('query')]
    private ?SearchEventsQuery $query;

    /**
     * @param array{
     *   cursor?: ?string,
     *   limit?: ?int,
     *   query?: ?SearchEventsQuery,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->query = $values['query'] ?? null;
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
     * @return ?SearchEventsQuery
     */
    public function getQuery(): ?SearchEventsQuery
    {
        return $this->query;
    }

    /**
     * @param ?SearchEventsQuery $value
     */
    public function setQuery(?SearchEventsQuery $value = null): self
    {
        $this->query = $value;
        return $this;
    }
}
