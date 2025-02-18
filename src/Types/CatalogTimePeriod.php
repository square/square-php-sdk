<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a time period - either a single period or a repeating period.
 */
class CatalogTimePeriod extends JsonSerializableType
{
    /**
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
     * @var ?string $event
     */
    #[JsonProperty('event')]
    private ?string $event;

    /**
     * @param array{
     *   event?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->event = $values['event'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getEvent(): ?string
    {
        return $this->event;
    }

    /**
     * @param ?string $value
     */
    public function setEvent(?string $value = null): self
    {
        $this->event = $value;
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
