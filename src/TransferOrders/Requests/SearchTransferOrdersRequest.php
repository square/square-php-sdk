<?php

namespace Square\TransferOrders\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\TransferOrderQuery;
use Square\Core\Json\JsonProperty;

class SearchTransferOrdersRequest extends JsonSerializableType
{
    /**
     * @var ?TransferOrderQuery $query The search query
     */
    #[JsonProperty('query')]
    private ?TransferOrderQuery $query;

    /**
     * @var ?string $cursor Pagination cursor from a previous search response
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?int $limit Maximum number of results to return (1-100)
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * @param array{
     *   query?: ?TransferOrderQuery,
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
     * @return ?TransferOrderQuery
     */
    public function getQuery(): ?TransferOrderQuery
    {
        return $this->query;
    }

    /**
     * @param ?TransferOrderQuery $value
     */
    public function setQuery(?TransferOrderQuery $value = null): self
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
