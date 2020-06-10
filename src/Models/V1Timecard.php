<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a timecard for an employee.
 */
class V1Timecard implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string
     */
    private $employeeId;

    /**
     * @var bool|null
     */
    private $deleted;

    /**
     * @var string|null
     */
    private $clockinTime;

    /**
     * @var string|null
     */
    private $clockoutTime;

    /**
     * @var string|null
     */
    private $clockinLocationId;

    /**
     * @var string|null
     */
    private $clockoutLocationId;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var float|null
     */
    private $regularSecondsWorked;

    /**
     * @var float|null
     */
    private $overtimeSecondsWorked;

    /**
     * @var float|null
     */
    private $doubletimeSecondsWorked;

    /**
     * @param string $employeeId
     */
    public function __construct(string $employeeId)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * Returns Id.
     *
     * The timecard's unique ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The timecard's unique ID.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Employee Id.
     *
     * The ID of the employee the timecard is associated with.
     */
    public function getEmployeeId(): string
    {
        return $this->employeeId;
    }

    /**
     * Sets Employee Id.
     *
     * The ID of the employee the timecard is associated with.
     *
     * @required
     * @maps employee_id
     */
    public function setEmployeeId(string $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    /**
     * Returns Deleted.
     *
     * If true, the timecard was deleted by the merchant, and it is no longer valid.
     */
    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * Sets Deleted.
     *
     * If true, the timecard was deleted by the merchant, and it is no longer valid.
     *
     * @maps deleted
     */
    public function setDeleted(?bool $deleted): void
    {
        $this->deleted = $deleted;
    }

    /**
     * Returns Clockin Time.
     *
     * The clock-in time for the timecard, in ISO 8601 format.
     */
    public function getClockinTime(): ?string
    {
        return $this->clockinTime;
    }

    /**
     * Sets Clockin Time.
     *
     * The clock-in time for the timecard, in ISO 8601 format.
     *
     * @maps clockin_time
     */
    public function setClockinTime(?string $clockinTime): void
    {
        $this->clockinTime = $clockinTime;
    }

    /**
     * Returns Clockout Time.
     *
     * The clock-out time for the timecard, in ISO 8601 format. Provide this value only if importing
     * timecard information from another system.
     */
    public function getClockoutTime(): ?string
    {
        return $this->clockoutTime;
    }

    /**
     * Sets Clockout Time.
     *
     * The clock-out time for the timecard, in ISO 8601 format. Provide this value only if importing
     * timecard information from another system.
     *
     * @maps clockout_time
     */
    public function setClockoutTime(?string $clockoutTime): void
    {
        $this->clockoutTime = $clockoutTime;
    }

    /**
     * Returns Clockin Location Id.
     *
     * The ID of the location the employee clocked in from. We strongly reccomend providing a
     * clockin_location_id. Square uses the clockin_location_id to determine a timecard’s timezone and
     * overtime rules.
     */
    public function getClockinLocationId(): ?string
    {
        return $this->clockinLocationId;
    }

    /**
     * Sets Clockin Location Id.
     *
     * The ID of the location the employee clocked in from. We strongly reccomend providing a
     * clockin_location_id. Square uses the clockin_location_id to determine a timecard’s timezone and
     * overtime rules.
     *
     * @maps clockin_location_id
     */
    public function setClockinLocationId(?string $clockinLocationId): void
    {
        $this->clockinLocationId = $clockinLocationId;
    }

    /**
     * Returns Clockout Location Id.
     *
     * The ID of the location the employee clocked out from. Provide this value only if importing timecard
     * information from another system.
     */
    public function getClockoutLocationId(): ?string
    {
        return $this->clockoutLocationId;
    }

    /**
     * Sets Clockout Location Id.
     *
     * The ID of the location the employee clocked out from. Provide this value only if importing timecard
     * information from another system.
     *
     * @maps clockout_location_id
     */
    public function setClockoutLocationId(?string $clockoutLocationId): void
    {
        $this->clockoutLocationId = $clockoutLocationId;
    }

    /**
     * Returns Created At.
     *
     * The time when the timecard was created, in ISO 8601 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the timecard was created, in ISO 8601 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The time when the timecard was most recently updated, in ISO 8601 format.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The time when the timecard was most recently updated, in ISO 8601 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Regular Seconds Worked.
     *
     * The total number of regular (non-overtime) seconds worked in the timecard.
     */
    public function getRegularSecondsWorked(): ?float
    {
        return $this->regularSecondsWorked;
    }

    /**
     * Sets Regular Seconds Worked.
     *
     * The total number of regular (non-overtime) seconds worked in the timecard.
     *
     * @maps regular_seconds_worked
     */
    public function setRegularSecondsWorked(?float $regularSecondsWorked): void
    {
        $this->regularSecondsWorked = $regularSecondsWorked;
    }

    /**
     * Returns Overtime Seconds Worked.
     *
     * The total number of overtime seconds worked in the timecard.
     */
    public function getOvertimeSecondsWorked(): ?float
    {
        return $this->overtimeSecondsWorked;
    }

    /**
     * Sets Overtime Seconds Worked.
     *
     * The total number of overtime seconds worked in the timecard.
     *
     * @maps overtime_seconds_worked
     */
    public function setOvertimeSecondsWorked(?float $overtimeSecondsWorked): void
    {
        $this->overtimeSecondsWorked = $overtimeSecondsWorked;
    }

    /**
     * Returns Doubletime Seconds Worked.
     *
     * The total number of doubletime seconds worked in the timecard.
     */
    public function getDoubletimeSecondsWorked(): ?float
    {
        return $this->doubletimeSecondsWorked;
    }

    /**
     * Sets Doubletime Seconds Worked.
     *
     * The total number of doubletime seconds worked in the timecard.
     *
     * @maps doubletime_seconds_worked
     */
    public function setDoubletimeSecondsWorked(?float $doubletimeSecondsWorked): void
    {
        $this->doubletimeSecondsWorked = $doubletimeSecondsWorked;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                      = $this->id;
        $json['employee_id']             = $this->employeeId;
        $json['deleted']                 = $this->deleted;
        $json['clockin_time']            = $this->clockinTime;
        $json['clockout_time']           = $this->clockoutTime;
        $json['clockin_location_id']     = $this->clockinLocationId;
        $json['clockout_location_id']    = $this->clockoutLocationId;
        $json['created_at']              = $this->createdAt;
        $json['updated_at']              = $this->updatedAt;
        $json['regular_seconds_worked']  = $this->regularSecondsWorked;
        $json['overtime_seconds_worked'] = $this->overtimeSecondsWorked;
        $json['doubletime_seconds_worked'] = $this->doubletimeSecondsWorked;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
