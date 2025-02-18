<?php

namespace Square\Terminal\Refunds\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\TerminalRefundQuery;
use Square\Core\Json\JsonProperty;

class SearchTerminalRefundsRequest extends JsonSerializableType
{
    /**
     * Queries the Terminal refunds based on given conditions and the sort order. Calling
     * `SearchTerminalRefunds` without an explicit query parameter returns all available
     * refunds with the default sort order.
     *
     * @var ?TerminalRefundQuery $query
     */
    #[JsonProperty('query')]
    private ?TerminalRefundQuery $query;

    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
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
     *   query?: ?TerminalRefundQuery,
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
     * @return ?TerminalRefundQuery
     */
    public function getQuery(): ?TerminalRefundQuery
    {
        return $this->query;
    }

    /**
     * @param ?TerminalRefundQuery $value
     */
    public function setQuery(?TerminalRefundQuery $value = null): self
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
