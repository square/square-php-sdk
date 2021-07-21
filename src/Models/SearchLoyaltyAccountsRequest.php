<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request to search for loyalty accounts.
 */
class SearchLoyaltyAccountsRequest implements \JsonSerializable
{
    /**
     * @var SearchLoyaltyAccountsRequestLoyaltyAccountQuery|null
     */
    private $query;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Query.
     *
     * The search criteria for the loyalty accounts.
     */
    public function getQuery(): ?SearchLoyaltyAccountsRequestLoyaltyAccountQuery
    {
        return $this->query;
    }

    /**
     * Sets Query.
     *
     * The search criteria for the loyalty accounts.
     *
     * @maps query
     */
    public function setQuery(?SearchLoyaltyAccountsRequestLoyaltyAccountQuery $query): void
    {
        $this->query = $query;
    }

    /**
     * Returns Limit.
     *
     * The maximum number of results to include in the response.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum number of results to include in the response.
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to
     * this endpoint. Provide this to retrieve the next set of
     * results for the original query.
     *
     * For more information,
     * see [Pagination](https://developer.squareup.com/docs/basics/api101/pagination).
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor returned by a previous call to
     * this endpoint. Provide this to retrieve the next set of
     * results for the original query.
     *
     * For more information,
     * see [Pagination](https://developer.squareup.com/docs/basics/api101/pagination).
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->query)) {
            $json['query']  = $this->query;
        }
        if (isset($this->limit)) {
            $json['limit']  = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor'] = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
