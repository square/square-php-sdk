<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an update request for a `TeamMember` object.
 */
class UpdateTeamMemberRequest extends JsonSerializableType
{
    /**
     * The team member fields to add, change, or clear. Fields can be cleared using a null value. To update
     * `wage_setting.job_assignments`, you must provide the complete list of job assignments. If needed, call
     * [ListJobs](api-endpoint:Team-ListJobs) to get the required `job_id` values.
     *
     * @var ?TeamMember $teamMember
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
