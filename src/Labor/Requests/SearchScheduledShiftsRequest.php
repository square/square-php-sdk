<?php

namespace Square\Labor\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\ScheduledShiftQuery;
use Square\Core\Json\JsonProperty;

class SearchScheduledShiftsRequest extends JsonSerializableType
{
    /**
     * @var ?ScheduledShiftQuery $query Query conditions used to filter and sort the results.
     */
    #[JsonProperty('query')]
    private ?ScheduledShiftQuery $query;

    /**
     * @var ?int $limit The maximum number of results to return in a single response page. The default value is 50.
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * The pagination cursor returned by the previous call to this endpoint. Provide
     * this cursor to retrieve the next page of results for your original request. For more
     * information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   query?: ?ScheduledShiftQuery,
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
     * @return ?ScheduledShiftQuery
     */
    public function getQuery(): ?ScheduledShiftQuery
    {
        return $this->query;
    }

    /**
     * @param ?ScheduledShiftQuery $value
     */
    public function setQuery(?ScheduledShiftQuery $value = null): self
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
