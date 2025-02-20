<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A range defined by two dates. Used for filtering a query for Connect v2
 * objects that have date properties.
 */
class DateRange extends JsonSerializableType
{
    /**
     * A string in `YYYY-MM-DD` format, such as `2017-10-31`, per the ISO 8601
     * extended format for calendar dates.
     * The beginning of a date range (inclusive).
     *
     * @var ?string $startDate
     */
    #[JsonProperty('start_date')]
    private ?string $startDate;

    /**
     * A string in `YYYY-MM-DD` format, such as `2017-10-31`, per the ISO 8601
     * extended format for calendar dates.
     * The end of a date range (inclusive).
     *
     * @var ?string $endDate
     */
    #[JsonProperty('end_date')]
    private ?string $endDate;

    /**
     * @param array{
     *   startDate?: ?string,
     *   endDate?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->startDate = $values['startDate'] ?? null;
        $this->endDate = $values['endDate'] ?? null;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
