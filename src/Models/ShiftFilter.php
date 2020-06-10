<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines a filter used in a search for `Shift` records. `AND` logic is
 * used by Square's servers to apply each filter property specified.
 */
class ShiftFilter implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $locationIds;

    /**
     * @var string[]|null
     */
    private $employeeIds;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var TimeRange|null
     */
    private $start;

    /**
     * @var TimeRange|null
     */
    private $end;

    /**
     * @var ShiftWorkday|null
     */
    private $workday;

    /**
     * Returns Location Ids.
     *
     * Fetch shifts for the specified location.
     *
     * @return string[]|null
     */
    public function getLocationIds(): ?array
    {
        return $this->locationIds;
    }

    /**
     * Sets Location Ids.
     *
     * Fetch shifts for the specified location.
     *
     * @maps location_ids
     *
     * @param string[]|null $locationIds
     */
    public function setLocationIds(?array $locationIds): void
    {
        $this->locationIds = $locationIds;
    }

    /**
     * Returns Employee Ids.
     *
     * Fetch shifts for the specified employee.
     *
     * @return string[]|null
     */
    public function getEmployeeIds(): ?array
    {
        return $this->employeeIds;
    }

    /**
     * Sets Employee Ids.
     *
     * Fetch shifts for the specified employee.
     *
     * @maps employee_ids
     *
     * @param string[]|null $employeeIds
     */
    public function setEmployeeIds(?array $employeeIds): void
    {
        $this->employeeIds = $employeeIds;
    }

    /**
     * Returns Status.
     *
     * Specifies the `status` of `Shift` records to be returned.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Specifies the `status` of `Shift` records to be returned.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Start.
     *
     * Represents a generic time range. The start and end values are
     * represented in RFC-3339 format. Time ranges are customized to be
     * inclusive or exclusive based on the needs of a particular endpoint.
     * Refer to the relevent endpoint-specific documentation to determine
     * how time ranges are handled.
     */
    public function getStart(): ?TimeRange
    {
        return $this->start;
    }

    /**
     * Sets Start.
     *
     * Represents a generic time range. The start and end values are
     * represented in RFC-3339 format. Time ranges are customized to be
     * inclusive or exclusive based on the needs of a particular endpoint.
     * Refer to the relevent endpoint-specific documentation to determine
     * how time ranges are handled.
     *
     * @maps start
     */
    public function setStart(?TimeRange $start): void
    {
        $this->start = $start;
    }

    /**
     * Returns End.
     *
     * Represents a generic time range. The start and end values are
     * represented in RFC-3339 format. Time ranges are customized to be
     * inclusive or exclusive based on the needs of a particular endpoint.
     * Refer to the relevent endpoint-specific documentation to determine
     * how time ranges are handled.
     */
    public function getEnd(): ?TimeRange
    {
        return $this->end;
    }

    /**
     * Sets End.
     *
     * Represents a generic time range. The start and end values are
     * represented in RFC-3339 format. Time ranges are customized to be
     * inclusive or exclusive based on the needs of a particular endpoint.
     * Refer to the relevent endpoint-specific documentation to determine
     * how time ranges are handled.
     *
     * @maps end
     */
    public function setEnd(?TimeRange $end): void
    {
        $this->end = $end;
    }

    /**
     * Returns Workday.
     *
     * A `Shift` search query filter parameter that sets a range of days that
     * a `Shift` must start or end in before passing the filter condition.
     */
    public function getWorkday(): ?ShiftWorkday
    {
        return $this->workday;
    }

    /**
     * Sets Workday.
     *
     * A `Shift` search query filter parameter that sets a range of days that
     * a `Shift` must start or end in before passing the filter condition.
     *
     * @maps workday
     */
    public function setWorkday(?ShiftWorkday $workday): void
    {
        $this->workday = $workday;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['location_ids'] = $this->locationIds;
        $json['employee_ids'] = $this->employeeIds;
        $json['status']      = $this->status;
        $json['start']       = $this->start;
        $json['end']         = $this->end;
        $json['workday']     = $this->workday;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
