<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines a filter used in a search for `Timecard` records. `AND` logic is
 * used by Square's servers to apply each filter property specified.
 */
class TimecardFilter extends JsonSerializableType
{
    /**
     * @var ?array<string> $locationIds Fetch timecards for the specified location.
     */
    #[JsonProperty('location_ids'), ArrayType(['string'])]
    private ?array $locationIds;

    /**
     * Fetch a `Timecard` instance by `Timecard.status`.
     * See [TimecardFilterStatus](#type-timecardfilterstatus) for possible values
     *
     * @var ?value-of<TimecardFilterStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?TimeRange $start Fetch `Timecard` instances that start in the time range - Inclusive.
     */
    #[JsonProperty('start')]
    private ?TimeRange $start;

    /**
     * @var ?TimeRange $end Fetch the `Timecard` instances that end in the time range - Inclusive.
     */
    #[JsonProperty('end')]
    private ?TimeRange $end;

    /**
     * @var ?TimecardWorkday $workday Fetch the `Timecard` instances based on the workday date range.
     */
    #[JsonProperty('workday')]
    private ?TimecardWorkday $workday;

    /**
     * @var ?array<string> $teamMemberIds Fetch timecards for the specified team members.
     */
    #[JsonProperty('team_member_ids'), ArrayType(['string'])]
    private ?array $teamMemberIds;

    /**
     * @param array{
     *   locationIds?: ?array<string>,
     *   status?: ?value-of<TimecardFilterStatus>,
     *   start?: ?TimeRange,
     *   end?: ?TimeRange,
     *   workday?: ?TimecardWorkday,
     *   teamMemberIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationIds = $values['locationIds'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->start = $values['start'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->workday = $values['workday'] ?? null;
        $this->teamMemberIds = $values['teamMemberIds'] ?? null;
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
     * @return ?value-of<TimecardFilterStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<TimecardFilterStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
     * @return ?TimecardWorkday
     */
    public function getWorkday(): ?TimecardWorkday
    {
        return $this->workday;
    }

    /**
     * @param ?TimecardWorkday $value
     */
    public function setWorkday(?TimecardWorkday $value = null): self
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
