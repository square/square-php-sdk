<?php

namespace Square\Terminal\Checkouts\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\TerminalCheckoutQuery;
use Square\Core\Json\JsonProperty;

class SearchTerminalCheckoutsRequest extends JsonSerializableType
{
    /**
     * Queries Terminal checkouts based on given conditions and the sort order.
     * Leaving these unset returns all checkouts with the default sort order.
     *
     * @var ?TerminalCheckoutQuery $query
     */
    #[JsonProperty('query')]
    private ?TerminalCheckoutQuery $query;

    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     * See [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination) for more information.
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?int $limit Limits the number of results returned for a single request.
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * @param array{
     *   query?: ?TerminalCheckoutQuery,
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
     * @return ?TerminalCheckoutQuery
     */
    public function getQuery(): ?TerminalCheckoutQuery
    {
        return $this->query;
    }

    /**
     * @param ?TerminalCheckoutQuery $value
     */
    public function setQuery(?TerminalCheckoutQuery $value = null): self
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
