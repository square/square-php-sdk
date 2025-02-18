<?php

namespace Square\Labor\Shifts\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\ShiftQuery;
use Square\Core\Json\JsonProperty;

class SearchShiftsRequest extends JsonSerializableType
{
    /**
     * @var ?ShiftQuery $query Query filters.
     */
    #[JsonProperty('query')]
    private ?ShiftQuery $query;

    /**
     * @var ?int $limit The number of resources in a page (200 by default).
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * @var ?string $cursor An opaque cursor for fetching the next page.
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   query?: ?ShiftQuery,
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
     * @return ?ShiftQuery
     */
    public function getQuery(): ?ShiftQuery
    {
        return $this->query;
    }

    /**
     * @param ?ShiftQuery $value
     */
    public function setQuery(?ShiftQuery $value = null): self
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
