<?php

namespace Square\Loyalty\Rewards\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\SearchLoyaltyRewardsRequestLoyaltyRewardQuery;
use Square\Core\Json\JsonProperty;

class SearchLoyaltyRewardsRequest extends JsonSerializableType
{
    /**
     * The search criteria for the request.
     * If empty, the endpoint retrieves all loyalty rewards in the loyalty program.
     *
     * @var ?SearchLoyaltyRewardsRequestLoyaltyRewardQuery $query
     */
    #[JsonProperty('query')]
    private ?SearchLoyaltyRewardsRequestLoyaltyRewardQuery $query;

    /**
     * @var ?int $limit The maximum number of results to return in the response. The default value is 30.
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * A pagination cursor returned by a previous call to
     * this endpoint. Provide this to retrieve the next set of
     * results for the original query.
     * For more information,
     * see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   query?: ?SearchLoyaltyRewardsRequestLoyaltyRewardQuery,
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
     * @return ?SearchLoyaltyRewardsRequestLoyaltyRewardQuery
     */
    public function getQuery(): ?SearchLoyaltyRewardsRequestLoyaltyRewardQuery
    {
        return $this->query;
    }

    /**
     * @param ?SearchLoyaltyRewardsRequestLoyaltyRewardQuery $value
     */
    public function setQuery(?SearchLoyaltyRewardsRequestLoyaltyRewardQuery $value = null): self
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
