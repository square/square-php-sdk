<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents scheduling information that determines when purchases can qualify to earn points
 * from a [loyalty promotion](entity:LoyaltyPromotion).
 */
class LoyaltyPromotionAvailableTimeData extends JsonSerializableType
{
    /**
     * The date that the promotion starts, in `YYYY-MM-DD` format. Square populates this field
     * based on the provided `time_periods`.
     *
     * @var ?string $startDate
     */
    #[JsonProperty('start_date')]
    private ?string $startDate;

    /**
     * The date that the promotion ends, in `YYYY-MM-DD` format. Square populates this field
     * based on the provided `time_periods`. If an end date is not specified, an `ACTIVE` promotion
     * remains available until it is canceled.
     *
     * @var ?string $endDate
     */
    #[JsonProperty('end_date')]
    private ?string $endDate;

    /**
     * A list of [iCalendar (RFC 5545) events](https://tools.ietf.org/html/rfc5545#section-3.6.1)
     * (`VEVENT`). Each event represents an available time period per day or days of the week.
     * A day can have a maximum of one available time period.
     *
     * Only `DTSTART`, `DURATION`, and `RRULE` are supported. `DTSTART` and `DURATION` are required and
     * timestamps must be in local (unzoned) time format. Include `RRULE` to specify recurring promotions,
     * an end date (using the `UNTIL` keyword), or both. For more information, see
     * [Available time](https://developer.squareup.com/docs/loyalty-api/loyalty-promotions#available-time).
     *
     * Note that `BEGIN:VEVENT` and `END:VEVENT` are optional in a `CreateLoyaltyPromotion` request
     * but are always included in the response.
     *
     * @var array<string> $timePeriods
     */
    #[JsonProperty('time_periods'), ArrayType(['string'])]
    private array $timePeriods;

    /**
     * @param array{
     *   timePeriods: array<string>,
     *   startDate?: ?string,
     *   endDate?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->startDate = $values['startDate'] ?? null;
        $this->endDate = $values['endDate'] ?? null;
        $this->timePeriods = $values['timePeriods'];
    }

    /**
     * @return ?string
     */
    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    /**
     * @param ?string $value
     */
    public function setStartDate(?string $value = null): self
    {
        $this->startDate = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    /**
     * @param ?string $value
     */
    public function setEndDate(?string $value = null): self
    {
        $this->endDate = $value;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getTimePeriods(): array
    {
        return $this->timePeriods;
    }

    /**
     * @param array<string> $value
     */
    public function setTimePeriods(array $value): self
    {
        $this->timePeriods = $value;
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
