<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a time period - either a single period or a repeating period.
 */
class CatalogTimePeriod implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $event;

    /**
     * Returns Event.
     *
     * An iCalendar (RFC 5545) [event](https://tools.ietf.org/html/rfc5545#section-3.6.1), which
     * specifies the name, timing, duration and recurrence of this time period.
     *
     * Example:
     *
     * ```
     * DTSTART:20190707T180000
     * DURATION:P2H
     * RRULE:FREQ=WEEKLY;BYDAY=MO,WE,FR
     * ```
     *
     * Only `SUMMARY`, `DTSTART`, `DURATION` and `RRULE` fields are supported.
     * `DTSTART` must be in local (unzoned) time format. Note that while `BEGIN:VEVENT`
     * and `END:VEVENT` is not required in the request. The response will always
     * include them.
     */
    public function getEvent(): ?string
    {
        return $this->event;
    }

    /**
     * Sets Event.
     *
     * An iCalendar (RFC 5545) [event](https://tools.ietf.org/html/rfc5545#section-3.6.1), which
     * specifies the name, timing, duration and recurrence of this time period.
     *
     * Example:
     *
     * ```
     * DTSTART:20190707T180000
     * DURATION:P2H
     * RRULE:FREQ=WEEKLY;BYDAY=MO,WE,FR
     * ```
     *
     * Only `SUMMARY`, `DTSTART`, `DURATION` and `RRULE` fields are supported.
     * `DTSTART` must be in local (unzoned) time format. Note that while `BEGIN:VEVENT`
     * and `END:VEVENT` is not required in the request. The response will always
     * include them.
     *
     * @maps event
     */
    public function setEvent(?string $event): void
    {
        $this->event = $event;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->event)) {
            $json['event'] = $this->event;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
