<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a filter used in a search for `TeamMember` objects. `AND` logic is applied
 * between the individual fields, and `OR` logic is applied within list-based fields.
 * For example, setting this filter value:
 * ```
 * filter = (locations_ids = ["A", "B"], status = ACTIVE)
 * ```
 * returns only active team members assigned to either location "A" or "B".
 */
class SearchTeamMembersFilter implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $locationIds;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var bool|null
     */
    private $isOwner;

    /**
     * Returns Location Ids.
     *
     * When present, filters by team members assigned to the specified locations.
     * When empty, includes team members assigned to any location.
     *
     * @return string[]|null
     */
    public function getLocationIds(): ?array
    {
        return $this->locationIds;
    }

    /**
     * Sets Location Ids.
     *
     * When present, filters by team members assigned to the specified locations.
     * When empty, includes team members assigned to any location.
     *
     * @maps location_ids
     *
     * @param string[]|null $locationIds
     */
    public function setLocationIds(?array $locationIds): void
    {
        $this->locationIds = $locationIds;
    }

    /**
     * Returns Status.
     *
     * Enumerates the possible statuses the team member can have within a business.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Enumerates the possible statuses the team member can have within a business.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Is Owner.
     *
     * When present and set to true, returns the team member who is the owner of the Square account.
     */
    public function getIsOwner(): ?bool
    {
        return $this->isOwner;
    }

    /**
     * Sets Is Owner.
     *
     * When present and set to true, returns the team member who is the owner of the Square account.
     *
     * @maps is_owner
     */
    public function setIsOwner(?bool $isOwner): void
    {
        $this->isOwner = $isOwner;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->locationIds)) {
            $json['location_ids'] = $this->locationIds;
        }
        if (isset($this->status)) {
            $json['status']       = $this->status;
        }
        if (isset($this->isOwner)) {
            $json['is_owner']     = $this->isOwner;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
