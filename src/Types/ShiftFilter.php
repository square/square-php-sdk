<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines a filter used in a search for `Shift` records. `AND` logic is
 * used by Square's servers to apply each filter property specified.
 *
 * Deprecated at Square API version 2025-05-21. See the [migration notes](https://developer.squareup.com/docs/labor-api/what-it-does#migration-notes).
 */
class ShiftFilter extends JsonSerializableType
{
    /**
     * @var ?array<string> $locationIds Fetch shifts for the specified location.
     */
    #[JsonProperty('location_ids'), ArrayType(['string'])]
    private ?array $locationIds;

    /**
     * @var ?array<string> $employeeIds Fetch shifts for the specified employees. DEPRECATED at version 2020-08-26. Use `team_member_ids` instead.
     */
    #[JsonProperty('employee_ids'), ArrayType(['string'])]
    private ?array $employeeIds;

    /**
     * Fetch a `Shift` instance by `Shift.status`.
     * See [ShiftFilterStatus](#type-shiftfilterstatus) for possible values
     *
     * @var ?value-of<ShiftFilterStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?TimeRange $start Fetch `Shift` instances that start in the time range - Inclusive.
     */
    #[JsonProperty('start')]
    private ?TimeRange $start;

    /**
     * @var ?TimeRange $end Fetch the `Shift` instances that end in the time range - Inclusive.
     */
    #[JsonProperty('end')]
    private ?TimeRange $end;

    /**
     * @var ?ShiftWorkday $workday Fetch the `Shift` instances based on the workday date range.
     */
    #[JsonProperty('workday')]
    private ?ShiftWorkday $workday;

    /**
     * @var ?array<string> $teamMemberIds Fetch shifts for the specified team members. Replaced `employee_ids` at version "2020-08-26".
     */
    #[JsonProperty('team_member_ids'), ArrayType(['string'])]
    private ?array $teamMemberIds;

    /**
     * @param array{
     *   locationIds?: ?array<string>,
     *   employeeIds?: ?array<string>,
     *   status?: ?value-of<ShiftFilterStatus>,
     *   start?: ?TimeRange,
     *   end?: ?TimeRange,
     *   workday?: ?ShiftWorkday,
     *   teamMemberIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationIds = $values['locationIds'] ?? null;
        $this->employeeIds = $values['employeeIds'] ?? null;
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
     * @return ?array<string>
     */
    public function getEmployeeIds(): ?array
    {
        return $this->employeeIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setEmployeeIds(?array $value = null): self
    {
        $this->employeeIds = $value;
        return $this;
    }

    /**
     * @return ?value-of<ShiftFilterStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<ShiftFilterStatus> $value
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
     * @return ?ShiftWorkday
     */
    public function getWorkday(): ?ShiftWorkday
    {
        return $this->workday;
    }

    /**
     * @param ?ShiftWorkday $value
     */
    public function setWorkday(?ShiftWorkday $value = null): self
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
