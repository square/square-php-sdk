<?php

declare(strict_types=1);

namespace Square\Models;

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
     * RFC 3339 format.
     */
    public function getStartLocalTime(): ?string
    {
        return $this->startLocalTime;
    }

    /**
     * Sets Start Local Time.
     *
     * The start time of a business hours period, specified in local time using partial-time
     * RFC 3339 format.
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
     * RFC 3339 format.
     */
    public function getEndLocalTime(): ?string
    {
        return $this->endLocalTime;
    }

    /**
     * Sets End Local Time.
     *
     * The end time of a business hours period, specified in local time using partial-time
     * RFC 3339 format.
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
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['day_of_week']    = $this->dayOfWeek;
        $json['start_local_time'] = $this->startLocalTime;
        $json['end_local_time'] = $this->endLocalTime;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
