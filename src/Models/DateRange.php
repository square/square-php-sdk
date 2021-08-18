<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A range defined by two dates. Used for filtering a query for Connect v2
 * objects that have date properties.
 */
class DateRange implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $startDate;

    /**
     * @var string|null
     */
    private $endDate;

    /**
     * Returns Start Date.
     *
     * A string in `YYYY-MM-DD` format, such as `2017-10-31`, per the ISO 8601
     * extended format for calendar dates.
     * The beginning of a date range (inclusive).
     */
    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    /**
     * Sets Start Date.
     *
     * A string in `YYYY-MM-DD` format, such as `2017-10-31`, per the ISO 8601
     * extended format for calendar dates.
     * The beginning of a date range (inclusive).
     *
     * @maps start_date
     */
    public function setStartDate(?string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * Returns End Date.
     *
     * A string in `YYYY-MM-DD` format, such as `2017-10-31`, per the ISO 8601
     * extended format for calendar dates.
     * The end of a date range (inclusive).
     */
    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    /**
     * Sets End Date.
     *
     * A string in `YYYY-MM-DD` format, such as `2017-10-31`, per the ISO 8601
     * extended format for calendar dates.
     * The end of a date range (inclusive).
     *
     * @maps end_date
     */
    public function setEndDate(?string $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->startDate)) {
            $json['start_date'] = $this->startDate;
        }
        if (isset($this->endDate)) {
            $json['end_date']   = $this->endDate;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
