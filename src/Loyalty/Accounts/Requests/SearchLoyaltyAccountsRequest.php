<?php

namespace Square\Loyalty\Accounts\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\SearchLoyaltyAccountsRequestLoyaltyAccountQuery;
use Square\Core\Json\JsonProperty;

class SearchLoyaltyAccountsRequest extends JsonSerializableType
{
    /**
     * @var ?SearchLoyaltyAccountsRequestLoyaltyAccountQuery $query The search criteria for the request.
     */
    #[JsonProperty('query')]
    private ?SearchLoyaltyAccountsRequestLoyaltyAccountQuery $query;

    /**
     * @var ?int $limit The maximum number of results to include in the response. The default value is 30.
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * A pagination cursor returned by a previous call to
     * this endpoint. Provide this to retrieve the next set of
     * results for the original query.
     *
     * For more information,
     * see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   query?: ?SearchLoyaltyAccountsRequestLoyaltyAccountQuery,
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
     * @return ?SearchLoyaltyAccountsRequestLoyaltyAccountQuery
     */
    public function getQuery(): ?SearchLoyaltyAccountsRequestLoyaltyAccountQuery
    {
        return $this->query;
    }

    /**
     * @param ?SearchLoyaltyAccountsRequestLoyaltyAccountQuery $value
     */
    public function setQuery(?SearchLoyaltyAccountsRequestLoyaltyAccountQuery $value = null): self
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
