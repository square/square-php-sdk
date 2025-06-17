<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TeamMemberCreatedEventObject extends JsonSerializableType
{
    /**
     * @var ?TeamMember $teamMember The created team member.
     */
    #[JsonProperty('team_member')]
    private ?TeamMember $teamMember;

    /**
     * @param array{
     *   teamMember?: ?TeamMember,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamMember = $values['teamMember'] ?? null;
    }

    /**
     * @return ?TeamMember
     */
    public function getTeamMember(): ?TeamMember
    {
        return $this->teamMember;
    }

    /**
     * @param ?TeamMember $value
     */
    public function setTeamMember(?TeamMember $value = null): self
    {
        $this->teamMember = $value;
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
