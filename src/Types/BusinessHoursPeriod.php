<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a period of time during which a business location is open.
 */
class BusinessHoursPeriod extends JsonSerializableType
{
    /**
     * The day of the week for this time period.
     * See [DayOfWeek](#type-dayofweek) for possible values
     *
     * @var ?value-of<DayOfWeek> $dayOfWeek
     */
    #[JsonProperty('day_of_week')]
    private ?string $dayOfWeek;

    /**
     * The start time of a business hours period, specified in local time using partial-time
     * RFC 3339 format. For example, `8:30:00` for a period starting at 8:30 in the morning.
     * Note that the seconds value is always :00, but it is appended for conformance to the RFC.
     *
     * @var ?string $startLocalTime
     */
    #[JsonProperty('start_local_time')]
    private ?string $startLocalTime;

    /**
     * The end time of a business hours period, specified in local time using partial-time
     * RFC 3339 format. For example, `21:00:00` for a period ending at 9:00 in the evening.
     * Note that the seconds value is always :00, but it is appended for conformance to the RFC.
     *
     * @var ?string $endLocalTime
     */
    #[JsonProperty('end_local_time')]
    private ?string $endLocalTime;

    /**
     * @param array{
     *   dayOfWeek?: ?value-of<DayOfWeek>,
     *   startLocalTime?: ?string,
     *   endLocalTime?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dayOfWeek = $values['dayOfWeek'] ?? null;
        $this->startLocalTime = $values['startLocalTime'] ?? null;
        $this->endLocalTime = $values['endLocalTime'] ?? null;
    }

    /**
     * @return ?value-of<DayOfWeek>
     */
    public function getDayOfWeek(): ?string
    {
        return $this->dayOfWeek;
    }

    /**
     * @param ?value-of<DayOfWeek> $value
     */
    public function setDayOfWeek(?string $value = null): self
    {
        $this->dayOfWeek = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getStartLocalTime(): ?string
    {
        return $this->startLocalTime;
    }

    /**
     * @param ?string $value
     */
    public function setStartLocalTime(?string $value = null): self
    {
        $this->startLocalTime = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEndLocalTime(): ?string
    {
        return $this->endLocalTime;
    }

    /**
     * @param ?string $value
     */
    public function setEndLocalTime(?string $value = null): self
    {
        $this->endLocalTime = $value;
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
