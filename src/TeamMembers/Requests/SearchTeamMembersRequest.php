<?php

namespace Square\TeamMembers\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\SearchTeamMembersQuery;
use Square\Core\Json\JsonProperty;

class SearchTeamMembersRequest extends JsonSerializableType
{
    /**
     * @var ?SearchTeamMembersQuery $query The query parameters.
     */
    #[JsonProperty('query')]
    private ?SearchTeamMembersQuery $query;

    /**
     * @var ?int $limit The maximum number of `TeamMember` objects in a page (100 by default).
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * The opaque cursor for fetching the next page. For more information, see
     * [pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   query?: ?SearchTeamMembersQuery,
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
     * @return ?SearchTeamMembersQuery
     */
    public function getQuery(): ?SearchTeamMembersQuery
    {
        return $this->query;
    }

    /**
     * @param ?SearchTeamMembersQuery $value
     */
    public function setQuery(?SearchTeamMembersQuery $value = null): self
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
