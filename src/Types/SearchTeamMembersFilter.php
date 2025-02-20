<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a filter used in a search for `TeamMember` objects. `AND` logic is applied
 * between the individual fields, and `OR` logic is applied within list-based fields.
 * For example, setting this filter value:
 * ```
 * filter = (locations_ids = ["A", "B"], status = ACTIVE)
 * ```
 * returns only active team members assigned to either location "A" or "B".
 */
class SearchTeamMembersFilter extends JsonSerializableType
{
    /**
     * When present, filters by team members assigned to the specified locations.
     * When empty, includes team members assigned to any location.
     *
     * @var ?array<string> $locationIds
     */
    #[JsonProperty('location_ids'), ArrayType(['string'])]
    private ?array $locationIds;

    /**
     * When present, filters by team members who match the given status.
     * When empty, includes team members of all statuses.
     * See [TeamMemberStatus](#type-teammemberstatus) for possible values
     *
     * @var ?value-of<TeamMemberStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?bool $isOwner When present and set to true, returns the team member who is the owner of the Square account.
     */
    #[JsonProperty('is_owner')]
    private ?bool $isOwner;

    /**
     * @param array{
     *   locationIds?: ?array<string>,
     *   status?: ?value-of<TeamMemberStatus>,
     *   isOwner?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationIds = $values['locationIds'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->isOwner = $values['isOwner'] ?? null;
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
     * @return ?value-of<TeamMemberStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<TeamMemberStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsOwner(): ?bool
    {
        return $this->isOwner;
    }

    /**
     * @param ?bool $value
     */
    public function setIsOwner(?bool $value = null): self
    {
        $this->isOwner = $value;
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
