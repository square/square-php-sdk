<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents the parameters in a search for `TeamMember` objects.
 */
class SearchTeamMembersQuery implements \JsonSerializable
{
    /**
     * @var SearchTeamMembersFilter|null
     */
    private $filter;

    /**
     * Returns Filter.
     *
     * Represents a filter used in a search for `TeamMember` objects. `AND` logic is applied
     * between the individual fields, and `OR` logic is applied within list-based fields.
     * For example, setting this filter value:
     * ```
     * filter = (locations_ids = ["A", "B"], status = ACTIVE)
     * ```
     * returns only active team members assigned to either location "A" or "B".
     */
    public function getFilter(): ?SearchTeamMembersFilter
    {
        return $this->filter;
    }

    /**
     * Sets Filter.
     *
     * Represents a filter used in a search for `TeamMember` objects. `AND` logic is applied
     * between the individual fields, and `OR` logic is applied within list-based fields.
     * For example, setting this filter value:
     * ```
     * filter = (locations_ids = ["A", "B"], status = ACTIVE)
     * ```
     * returns only active team members assigned to either location "A" or "B".
     *
     * @maps filter
     */
    public function setFilter(?SearchTeamMembersFilter $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->filter)) {
            $json['filter'] = $this->filter;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
