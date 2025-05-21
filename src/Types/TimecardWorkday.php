<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A `Timecard` search query filter parameter that sets a range of days that
 * a `Timecard` must start or end in before passing the filter condition.
 */
class TimecardWorkday extends JsonSerializableType
{
    /**
     * @var ?DateRange $dateRange Dates for fetching the timecards.
     */
    #[JsonProperty('date_range')]
    private ?DateRange $dateRange;

    /**
     * The strategy on which the dates are applied.
     * See [TimecardWorkdayMatcher](#type-timecardworkdaymatcher) for possible values
     *
     * @var ?value-of<TimecardWorkdayMatcher> $matchTimecardsBy
     */
    #[JsonProperty('match_timecards_by')]
    private ?string $matchTimecardsBy;

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
     *   matchTimecardsBy?: ?value-of<TimecardWorkdayMatcher>,
     *   defaultTimezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dateRange = $values['dateRange'] ?? null;
        $this->matchTimecardsBy = $values['matchTimecardsBy'] ?? null;
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
     * @return ?value-of<TimecardWorkdayMatcher>
     */
    public function getMatchTimecardsBy(): ?string
    {
        return $this->matchTimecardsBy;
    }

    /**
     * @param ?value-of<TimecardWorkdayMatcher> $value
     */
    public function setMatchTimecardsBy(?string $value = null): self
    {
        $this->matchTimecardsBy = $value;
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
