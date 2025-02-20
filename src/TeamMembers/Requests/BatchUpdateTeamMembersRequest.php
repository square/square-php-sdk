<?php

namespace Square\TeamMembers\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\UpdateTeamMemberRequest;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchUpdateTeamMembersRequest extends JsonSerializableType
{
    /**
     * The data used to update the `TeamMember` objects. Each key is the `team_member_id` that maps to the `UpdateTeamMemberRequest`.
     * The maximum number of update objects is 25.
     *
     * For each team member, include the fields to add, change, or clear. Fields can be cleared using a null value.
     * To update `wage_setting.job_assignments`, you must provide the complete list of job assignments. If needed,
     * call [ListJobs](api-endpoint:Team-ListJobs) to get the required `job_id` values.
     *
     * @var array<string, UpdateTeamMemberRequest> $teamMembers
     */
    #[JsonProperty('team_members'), ArrayType(['string' => UpdateTeamMemberRequest::class])]
    private array $teamMembers;

    /**
     * @param array{
     *   teamMembers: array<string, UpdateTeamMemberRequest>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->teamMembers = $values['teamMembers'];
    }

    /**
     * @return array<string, UpdateTeamMemberRequest>
     */
    public function getTeamMembers(): array
    {
        return $this->teamMembers;
    }

    /**
     * @param array<string, UpdateTeamMemberRequest> $value
     */
    public function setTeamMembers(array $value): self
    {
        $this->teamMembers = $value;
        return $this;
    }
}
