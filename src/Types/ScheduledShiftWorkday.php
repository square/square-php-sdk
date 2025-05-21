<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A `ScheduledShift` search query filter parameter that sets a range of days that
 * a `Shift` must start or end in before passing the filter condition.
 */
class ScheduledShiftWorkday extends JsonSerializableType
{
    /**
     * @var ?DateRange $dateRange Dates for fetching the scheduled shifts.
     */
    #[JsonProperty('date_range')]
    private ?DateRange $dateRange;

    /**
     * The strategy on which the dates are applied.
     * See [ScheduledShiftWorkdayMatcher](#type-scheduledshiftworkdaymatcher) for possible values
     *
     * @var ?value-of<ScheduledShiftWorkdayMatcher> $matchScheduledShiftsBy
     */
    #[JsonProperty('match_scheduled_shifts_by')]
    private ?string $matchScheduledShiftsBy;

    /**
     * Location-specific timezones convert workdays to datetime filters.
     * Every location included in the query must have a timezone or this field
     * must be provided as a fallback. Format: the IANA timezone database
     * identifier for the relevant timezone.
     *
     * @var ?string $defaultTimezone
     */
    #[JsonProperty('default_timezone')]
    private ?string $defaultTimezone;

    /**
     * @param array{
     *   dateRange?: ?DateRange,
     *   matchScheduledShiftsBy?: ?value-of<ScheduledShiftWorkdayMatcher>,
     *   defaultTimezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dateRange = $values['dateRange'] ?? null;
        $this->matchScheduledShiftsBy = $values['matchScheduledShiftsBy'] ?? null;
        $this->defaultTimezone = $values['defaultTimezone'] ?? null;
    }

    /**
     * @return ?DateRange
     */
    public function getDateRange(): ?DateRange
    {
        return $this->dateRange;
    }

    /**
     * @param ?DateRange $value
     */
    public function setDateRange(?DateRange $value = null): self
    {
        $this->dateRange = $value;
        return $this;
    }

    /**
     * @return ?value-of<ScheduledShiftWorkdayMatcher>
     */
    public function getMatchScheduledShiftsBy(): ?string
    {
        return $this->matchScheduledShiftsBy;
    }

    /**
     * @param ?value-of<ScheduledShiftWorkdayMatcher> $value
     */
    public function setMatchScheduledShiftsBy(?string $value = null): self
    {
        $this->matchScheduledShiftsBy = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDefaultTimezone(): ?string
    {
        return $this->defaultTimezone;
    }

    /**
     * @param ?string $value
     */
    public function setDefaultTimezone(?string $value = null): self
    {
        $this->defaultTimezone = $value;
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
