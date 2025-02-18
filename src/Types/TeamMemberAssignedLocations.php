<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * An object that represents a team member's assignment to locations.
 */
class TeamMemberAssignedLocations extends JsonSerializableType
{
    /**
     * The current assignment type of the team member.
     * See [TeamMemberAssignedLocationsAssignmentType](#type-teammemberassignedlocationsassignmenttype) for possible values
     *
     * @var ?value-of<TeamMemberAssignedLocationsAssignmentType> $assignmentType
     */
    #[JsonProperty('assignment_type')]
    private ?string $assignmentType;

    /**
     * @var ?array<string> $locationIds The explicit locations that the team member is assigned to.
     */
    #[JsonProperty('location_ids'), ArrayType(['string'])]
    private ?array $locationIds;

    /**
     * @param array{
     *   assignmentType?: ?value-of<TeamMemberAssignedLocationsAssignmentType>,
     *   locationIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->assignmentType = $values['assignmentType'] ?? null;
        $this->locationIds = $values['locationIds'] ?? null;
    }

    /**
     * @return ?value-of<TeamMemberAssignedLocationsAssignmentType>
     */
    public function getAssignmentType(): ?string
    {
        return $this->assignmentType;
    }

    /**
     * @param ?value-of<TeamMemberAssignedLocationsAssignmentType> $value
     */
    public function setAssignmentType(?string $value = null): self
    {
        $this->assignmentType = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getLocationIds(): ?array
    {
        return $this->locationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setLocationIds(?array $value = null): self
    {
        $this->locationIds = $value;
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
