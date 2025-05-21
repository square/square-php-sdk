<?php

namespace Square\Labor\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\TimecardQuery;
use Square\Core\Json\JsonProperty;

class SearchTimecardsRequest extends JsonSerializableType
{
    /**
     * @var ?TimecardQuery $query Query filters.
     */
    #[JsonProperty('query')]
    private ?TimecardQuery $query;

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
     *   query?: ?TimecardQuery,
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
     * @return ?TimecardQuery
     */
    public function getQuery(): ?TimecardQuery
    {
        return $this->query;
    }

    /**
     * @param ?TimecardQuery $value
     */
    public function setQuery(?TimecardQuery $value = null): self
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
