<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Filter events by date time range.
 */
class LoyaltyEventDateTimeFilter extends JsonSerializableType
{
    /**
     * @var TimeRange $createdAt The `created_at` date time range used to filter the result.
     */
    #[JsonProperty('created_at')]
    private TimeRange $createdAt;

    /**
     * @param array{
     *   createdAt: TimeRange,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return TimeRange
     */
    public function getCreatedAt(): TimeRange
    {
        return $this->createdAt;
    }

    /**
     * @param TimeRange $value
     */
    public function setCreatedAt(TimeRange $value): self
    {
        $this->createdAt = $value;
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
