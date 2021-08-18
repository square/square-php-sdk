<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request to update a `Shift` object.
 */
class UpdateShiftRequest implements \JsonSerializable
{
    /**
     * @var Shift
     */
    private $shift;

    /**
     * @param Shift $shift
     */
    public function __construct(Shift $shift)
    {
        $this->shift = $shift;
    }

    /**
     * Returns Shift.
     *
     * A record of the hourly rate, start, and end times for a single work shift
     * for an employee. This might include a record of the start and end times for breaks
     * taken during the shift.
     */
    public function getShift(): Shift
    {
        return $this->shift;
    }

    /**
     * Sets Shift.
     *
     * A record of the hourly rate, start, and end times for a single work shift
     * for an employee. This might include a record of the start and end times for breaks
     * taken during the shift.
     *
     * @required
     * @maps shift
     */
    public function setShift(Shift $shift): void
    {
        $this->shift = $shift;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['shift'] = $this->shift;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
