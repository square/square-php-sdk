<?php

namespace Square\TeamMembers\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\UpdateTeamMemberRequest;

class UpdateTeamMembersRequest extends JsonSerializableType
{
    /**
     * @var string $teamMemberId The ID of the team member to update.
     */
    private string $teamMemberId;

    /**
     * @var UpdateTeamMemberRequest $body
     */
    private UpdateTeamMemberRequest $body;

    /**
     * @param array{
     *   teamMemberId: string,
     *   body: UpdateTeamMemberRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->teamMemberId = $values['teamMemberId'];
        $this->body = $values['body'];
    }

    /**
     * @return string
     */
    public function getTeamMemberId(): string
    {
        return $this->teamMemberId;
    }

    /**
     * @param string $value
     */
    public function setTeamMemberId(string $value): self
    {
        $this->teamMemberId = $value;
        return $this;
    }

    /**
     * @return UpdateTeamMemberRequest
     */
    public function getBody(): UpdateTeamMemberRequest
    {
        return $this->body;
    }

    /**
     * @param UpdateTeamMemberRequest $value
     */
    public function setBody(UpdateTeamMemberRequest $value): self
    {
        $this->body = $value;
        return $this;
    }
}
