<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A `Shift` search query filter parameter that sets a range of days that
 * a `Shift` must start or end in before passing the filter condition.
 *
 * Deprecated at Square API version 2025-05-21. See the [migration notes](https://developer.squareup.com/docs/labor-api/what-it-does#migration-notes).
 */
class ShiftWorkday extends JsonSerializableType
{
    /**
     * @var ?DateRange $dateRange Dates for fetching the shifts.
     */
    #[JsonProperty('date_range')]
    private ?DateRange $dateRange;

    /**
     * The strategy on which the dates are applied.
     * See [ShiftWorkdayMatcher](#type-shiftworkdaymatcher) for possible values
     *
     * @var ?value-of<ShiftWorkdayMatcher> $matchShiftsBy
     */
    #[JsonProperty('match_shifts_by')]
    private ?string $matchShiftsBy;

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
     *   matchShiftsBy?: ?value-of<ShiftWorkdayMatcher>,
     *   defaultTimezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dateRange = $values['dateRange'] ?? null;
        $this->matchShiftsBy = $values['matchShiftsBy'] ?? null;
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
     * @return ?value-of<ShiftWorkdayMatcher>
     */
    public function getMatchShiftsBy(): ?string
    {
        return $this->matchShiftsBy;
    }

    /**
     * @param ?value-of<ShiftWorkdayMatcher> $value
     */
    public function setMatchShiftsBy(?string $value = null): self
    {
        $this->matchShiftsBy = $value;
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
