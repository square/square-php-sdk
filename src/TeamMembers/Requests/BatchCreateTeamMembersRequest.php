<?php

namespace Square\TeamMembers\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\CreateTeamMemberRequest;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchCreateTeamMembersRequest extends JsonSerializableType
{
    /**
     * The data used to create the `TeamMember` objects. Each key is the `idempotency_key` that maps to the `CreateTeamMemberRequest`.
     * The maximum number of create objects is 25.
     *
     * If you include a team member's `wage_setting`, you must provide `job_id` for each job assignment. To get job IDs,
     * call [ListJobs](api-endpoint:Team-ListJobs).
     *
     * @var array<string, CreateTeamMemberRequest> $teamMembers
     */
    #[JsonProperty('team_members'), ArrayType(['string' => CreateTeamMemberRequest::class])]
    private array $teamMembers;

    /**
     * @param array{
     *   teamMembers: array<string, CreateTeamMemberRequest>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->teamMembers = $values['teamMembers'];
    }

    /**
     * @return array<string, CreateTeamMemberRequest>
     */
    public function getTeamMembers(): array
    {
        return $this->teamMembers;
    }

    /**
     * @param array<string, CreateTeamMemberRequest> $value
     */
    public function setTeamMembers(array $value): self
    {
        $this->teamMembers = $value;
        return $this;
    }
}
