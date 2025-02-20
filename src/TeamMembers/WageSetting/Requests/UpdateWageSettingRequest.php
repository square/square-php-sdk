<?php

namespace Square\TeamMembers\WageSetting\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\WageSetting;
use Square\Core\Json\JsonProperty;

class UpdateWageSettingRequest extends JsonSerializableType
{
    /**
     * @var string $teamMemberId The ID of the team member for which to update the `WageSetting` object.
     */
    private string $teamMemberId;

    /**
     * The complete `WageSetting` object. For all job assignments, specify one of the following:
     * - `job_id` (recommended) - If needed, call [ListJobs](api-endpoint:Team-ListJobs) to get a list of all jobs.
     * Requires Square API version 2024-12-18 or later.
     * - `job_title` - Use the exact, case-sensitive spelling of an existing title unless you want to create a new job.
     * This value is ignored if `job_id` is also provided.
     *
     * @var WageSetting $wageSetting
     */
    #[JsonProperty('wage_setting')]
    private WageSetting $wageSetting;

    /**
     * @param array{
     *   teamMemberId: string,
     *   wageSetting: WageSetting,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->teamMemberId = $values['teamMemberId'];
        $this->wageSetting = $values['wageSetting'];
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
     * @return WageSetting
     */
    public function getWageSetting(): WageSetting
    {
        return $this->wageSetting;
    }

    /**
     * @param WageSetting $value
     */
    public function setWageSetting(WageSetting $value): self
    {
        $this->wageSetting = $value;
        return $this;
    }
}
