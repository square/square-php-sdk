<?php

namespace Square\Terminal\Actions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\TerminalActionQuery;
use Square\Core\Json\JsonProperty;

class SearchTerminalActionsRequest extends JsonSerializableType
{
    /**
     * Queries terminal actions based on given conditions and sort order.
     * Leaving this unset will return all actions with the default sort order.
     *
     * @var ?TerminalActionQuery $query
     */
    #[JsonProperty('query')]
    private ?TerminalActionQuery $query;

    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for the original query.
     * See [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination) for more
     * information.
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?int $limit Limit the number of results returned for a single request.
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * @param array{
     *   query?: ?TerminalActionQuery,
     *   cursor?: ?string,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->query = $values['query'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }

    /**
     * @return ?TerminalActionQuery
     */
    public function getQuery(): ?TerminalActionQuery
    {
        return $this->query;
    }

    /**
     * @param ?TerminalActionQuery $value
     */
    public function setQuery(?TerminalActionQuery $value = null): self
    {
        $this->query = $value;
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
