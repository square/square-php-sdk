<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines filter criteria for a [SearchScheduledShifts](api-endpoint:Labor-SearchScheduledShifts)
 * request. Multiple filters in a query are combined as an `AND` operation.
 */
class ScheduledShiftFilter extends JsonSerializableType
{
    /**
     * Return shifts for the specified locations. When omitted, shifts for all
     * locations are returned. If needed, call [ListLocations](api-endpoint:Locations-ListLocations)
     * to get location IDs.
     *
     * @var ?array<string> $locationIds
     */
    #[JsonProperty('location_ids'), ArrayType(['string'])]
    private ?array $locationIds;

    /**
     * Return shifts whose `start_at` time is within the specified
     * time range (inclusive).
     *
     * @var ?TimeRange $start
     */
    #[JsonProperty('start')]
    private ?TimeRange $start;

    /**
     * Return shifts whose `end_at` time is within the specified
     * time range (inclusive).
     *
     * @var ?TimeRange $end
     */
    #[JsonProperty('end')]
    private ?TimeRange $end;

    /**
     * @var ?ScheduledShiftWorkday $workday Return shifts based on a workday date range.
     */
    #[JsonProperty('workday')]
    private ?ScheduledShiftWorkday $workday;

    /**
     * Return shifts assigned to specified team members. If needed, call
     * [SearchTeamMembers](api-endpoint:Team-SearchTeamMembers) to get team member IDs.
     *
     * To return only the shifts assigned to the specified team members, include the
     * `assignment_status` filter in the query. Otherwise, all unassigned shifts are
     * returned along with shifts assigned to the specified team members.
     *
     * @var ?array<string> $teamMemberIds
     */
    #[JsonProperty('team_member_ids'), ArrayType(['string'])]
    private ?array $teamMemberIds;

    /**
     * Return shifts based on whether a team member is assigned. A shift is
     * assigned if the `team_member_id` field is populated in the `draft_shift_details`
     * or `published_shift details` field of the shift.
     *
     * To return only draft or published shifts, include the `scheduled_shift_statuses`
     * filter in the query.
     * See [ScheduledShiftFilterAssignmentStatus](#type-scheduledshiftfilterassignmentstatus) for possible values
     *
     * @var ?value-of<ScheduledShiftFilterAssignmentStatus> $assignmentStatus
     */
    #[JsonProperty('assignment_status')]
    private ?string $assignmentStatus;

    /**
     * Return shifts based on the draft or published status of the shift.
     * A shift is published if the `published_shift_details` field is present.
     *
     * Note that shifts with `draft_shift_details.is_deleted` set to `true` are ignored
     * with the `DRAFT` filter.
     * See [ScheduledShiftFilterScheduledShiftStatus](#type-scheduledshiftfilterscheduledshiftstatus) for possible values
     *
     * @var ?array<value-of<ScheduledShiftFilterScheduledShiftStatus>> $scheduledShiftStatuses
     */
    #[JsonProperty('scheduled_shift_statuses'), ArrayType(['string'])]
    private ?array $scheduledShiftStatuses;

    /**
     * @param array{
     *   locationIds?: ?array<string>,
     *   start?: ?TimeRange,
     *   end?: ?TimeRange,
     *   workday?: ?ScheduledShiftWorkday,
     *   teamMemberIds?: ?array<string>,
     *   assignmentStatus?: ?value-of<ScheduledShiftFilterAssignmentStatus>,
     *   scheduledShiftStatuses?: ?array<value-of<ScheduledShiftFilterScheduledShiftStatus>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationIds = $values['locationIds'] ?? null;
        $this->start = $values['start'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->workday = $values['workday'] ?? null;
        $this->teamMemberIds = $values['teamMemberIds'] ?? null;
        $this->assignmentStatus = $values['assignmentStatus'] ?? null;
        $this->scheduledShiftStatuses = $values['scheduledShiftStatuses'] ?? null;
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
     * @return ?TimeRange
     */
    public function getStart(): ?TimeRange
    {
        return $this->start;
    }

    /**
     * @param ?TimeRange $value
     */
    public function setStart(?TimeRange $value = null): self
    {
        $this->start = $value;
        return $this;
    }

    /**
     * @return ?TimeRange
     */
    public function getEnd(): ?TimeRange
    {
        return $this->end;
    }

    /**
     * @param ?TimeRange $value
     */
    public function setEnd(?TimeRange $value = null): self
    {
        $this->end = $value;
        return $this;
    }

    /**
     * @return ?ScheduledShiftWorkday
     */
    public function getWorkday(): ?ScheduledShiftWorkday
    {
        return $this->workday;
    }

    /**
     * @param ?ScheduledShiftWorkday $value
     */
    public function setWorkday(?ScheduledShiftWorkday $value = null): self
    {
        $this->workday = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getTeamMemberIds(): ?array
    {
        return $this->teamMemberIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setTeamMemberIds(?array $value = null): self
    {
        $this->teamMemberIds = $value;
        return $this;
    }

    /**
     * @return ?value-of<ScheduledShiftFilterAssignmentStatus>
     */
    public function getAssignmentStatus(): ?string
    {
        return $this->assignmentStatus;
    }

    /**
     * @param ?value-of<ScheduledShiftFilterAssignmentStatus> $value
     */
    public function setAssignmentStatus(?string $value = null): self
    {
        $this->assignmentStatus = $value;
        return $this;
    }

    /**
     * @return ?array<value-of<ScheduledShiftFilterScheduledShiftStatus>>
     */
    public function getScheduledShiftStatuses(): ?array
    {
        return $this->scheduledShiftStatuses;
    }

    /**
     * @param ?array<value-of<ScheduledShiftFilterScheduledShiftStatus>> $value
     */
    public function setScheduledShiftStatuses(?array $value = null): self
    {
        $this->scheduledShiftStatuses = $value;
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
