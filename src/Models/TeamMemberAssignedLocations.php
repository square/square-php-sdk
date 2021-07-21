<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * An object that represents a team member's assignment to locations.
 */
class TeamMemberAssignedLocations implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $assignmentType;

    /**
     * @var string[]|null
     */
    private $locationIds;

    /**
     * Returns Assignment Type.
     *
     * Enumerates the possible assignment types that the team member can have.
     */
    public function getAssignmentType(): ?string
    {
        return $this->assignmentType;
    }

    /**
     * Sets Assignment Type.
     *
     * Enumerates the possible assignment types that the team member can have.
     *
     * @maps assignment_type
     */
    public function setAssignmentType(?string $assignmentType): void
    {
        $this->assignmentType = $assignmentType;
    }

    /**
     * Returns Location Ids.
     *
     * The locations that the team member is assigned to.
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
     * The locations that the team member is assigned to.
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->assignmentType)) {
            $json['assignment_type'] = $this->assignmentType;
        }
        if (isset($this->locationIds)) {
            $json['location_ids']    = $this->locationIds;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
