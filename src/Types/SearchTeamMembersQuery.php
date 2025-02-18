<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the parameters in a search for `TeamMember` objects.
 */
class SearchTeamMembersQuery extends JsonSerializableType
{
    /**
     * @var ?SearchTeamMembersFilter $filter The options to filter by.
     */
    #[JsonProperty('filter')]
    private ?SearchTeamMembersFilter $filter;

    /**
     * @param array{
     *   filter?: ?SearchTeamMembersFilter,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
    }

    /**
     * @return ?SearchTeamMembersFilter
     */
    public function getFilter(): ?SearchTeamMembersFilter
    {
        return $this->filter;
    }

    /**
     * @param ?SearchTeamMembersFilter $value
     */
    public function setFilter(?SearchTeamMembersFilter $value = null): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
