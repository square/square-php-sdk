<?php

namespace Square\Bookings\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkRetrieveTeamMemberBookingProfilesRequest extends JsonSerializableType
{
    /**
     * @var array<string> $teamMemberIds A non-empty list of IDs of team members whose booking profiles you want to retrieve.
     */
    #[JsonProperty('team_member_ids'), ArrayType(['string'])]
    private array $teamMemberIds;

    /**
     * @param array{
     *   teamMemberIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->teamMemberIds = $values['teamMemberIds'];
    }

    /**
     * @return array<string>
     */
    public function getTeamMemberIds(): array
    {
        return $this->teamMemberIds;
    }

    /**
     * @param array<string> $value
     */
    public function setTeamMemberIds(array $value): self
    {
        $this->teamMemberIds = $value;
        return $this;
    }
}
