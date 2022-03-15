<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents a period of time during which a business location is open.
 */
class BusinessHoursPeriod implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $dayOfWeek;

    /**
     * @var string|null
     */
    private $startLocalTime;

    /**
     * @var string|null
     */
    private $endLocalTime;

    /**
     * Returns Day of Week.
     *
     * Indicates the specific day  of the week.
     */
    public function getDayOfWeek(): ?string
    {
        return $this->dayOfWeek;
    }

    /**
     * Sets Day of Week.
     *
     * Indicates the specific day  of the week.
     *
     * @maps day_of_week
     */
    public function setDayOfWeek(?string $dayOfWeek): void
    {
        $this->dayOfWeek = $dayOfWeek;
    }

    /**
     * Returns Start Local Time.
     *
     * The start time of a business hours period, specified in local time using partial-time
     * RFC 3339 format. For example, `8:30:00` for a period starting at 8:30 in the morning.
     * Note that the seconds value will always be :00, but it is appended for conformance to the RFC.
     */
    public function getStartLocalTime(): ?string
    {
        return $this->startLocalTime;
    }

    /**
     * Sets Start Local Time.
     *
     * The start time of a business hours period, specified in local time using partial-time
     * RFC 3339 format. For example, `8:30:00` for a period starting at 8:30 in the morning.
     * Note that the seconds value will always be :00, but it is appended for conformance to the RFC.
     *
     * @maps start_local_time
     */
    public function setStartLocalTime(?string $startLocalTime): void
    {
        $this->startLocalTime = $startLocalTime;
    }

    /**
     * Returns End Local Time.
     *
     * The end time of a business hours period, specified in local time using partial-time
     * RFC 3339 format. For example, `21:00:00` for a period ending at 9:00 in the evening.
     * Note that the seconds value will always be :00, but it is appended for conformance to the RFC.
     */
    public function getEndLocalTime(): ?string
    {
        return $this->endLocalTime;
    }

    /**
     * Sets End Local Time.
     *
     * The end time of a business hours period, specified in local time using partial-time
     * RFC 3339 format. For example, `21:00:00` for a period ending at 9:00 in the evening.
     * Note that the seconds value will always be :00, but it is appended for conformance to the RFC.
     *
     * @maps end_local_time
     */
    public function setEndLocalTime(?string $endLocalTime): void
    {
        $this->endLocalTime = $endLocalTime;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->dayOfWeek)) {
            $json['day_of_week']      = $this->dayOfWeek;
        }
        if (isset($this->startLocalTime)) {
            $json['start_local_time'] = $this->startLocalTime;
        }
        if (isset($this->endLocalTime)) {
            $json['end_local_time']   = $this->endLocalTime;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
