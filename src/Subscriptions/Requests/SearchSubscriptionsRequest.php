<?php

namespace Square\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\SearchSubscriptionsQuery;
use Square\Core\Types\ArrayType;

class SearchSubscriptionsRequest extends JsonSerializableType
{
    /**
     * When the total number of resulting subscriptions exceeds the limit of a paged response,
     * specify the cursor returned from a preceding response here to fetch the next set of results.
     * If the cursor is unset, the response contains the last page of the results.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * The upper limit on the number of subscriptions to return
     * in a paged response.
     *
     * @var ?int $limit
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * A subscription query consisting of specified filtering conditions.
     *
     * If this `query` field is unspecified, the `SearchSubscriptions` call will return all subscriptions.
     *
     * @var ?SearchSubscriptionsQuery $query
     */
    #[JsonProperty('query')]
    private ?SearchSubscriptionsQuery $query;

    /**
     * An option to include related information in the response.
     *
     * The supported values are:
     *
     * - `actions`: to include scheduled actions on the targeted subscriptions.
     *
     * @var ?array<string> $include
     */
    #[JsonProperty('include'), ArrayType(['string'])]
    private ?array $include;

    /**
     * @param array{
     *   cursor?: ?string,
     *   limit?: ?int,
     *   query?: ?SearchSubscriptionsQuery,
     *   include?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->include = $values['include'] ?? null;
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

    /**
     * @return ?SearchSubscriptionsQuery
     */
    public function getQuery(): ?SearchSubscriptionsQuery
    {
        return $this->query;
    }

    /**
     * @param ?SearchSubscriptionsQuery $value
     */
    public function setQuery(?SearchSubscriptionsQuery $value = null): self
    {
        $this->query = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getInclude(): ?array
    {
        return $this->include;
    }

    /**
     * @param ?array<string> $value
     */
    public function setInclude(?array $value = null): self
    {
        $this->include = $value;
        return $this;
    }
}
