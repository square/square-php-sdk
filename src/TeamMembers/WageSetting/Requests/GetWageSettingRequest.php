<?php

namespace Square\TeamMembers\WageSetting\Requests;

use Square\Core\Json\JsonSerializableType;

class GetWageSettingRequest extends JsonSerializableType
{
    /**
     * @var string $teamMemberId The ID of the team member for which to retrieve the wage setting.
     */
    private string $teamMemberId;

    /**
     * @param array{
     *   teamMemberId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->teamMemberId = $values['teamMemberId'];
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
}
