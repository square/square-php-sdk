<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a set of points for a loyalty account that are scheduled to expire on a specific date.
 */
class LoyaltyAccountExpiringPointDeadline extends JsonSerializableType
{
    /**
     * @var int $points The number of points scheduled to expire at the `expires_at` timestamp.
     */
    #[JsonProperty('points')]
    private int $points;

    /**
     * @var string $expiresAt The timestamp of when the points are scheduled to expire, in RFC 3339 format.
     */
    #[JsonProperty('expires_at')]
    private string $expiresAt;

    /**
     * @param array{
     *   points: int,
     *   expiresAt: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->points = $values['points'];
        $this->expiresAt = $values['expiresAt'];
    }

    /**
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * @param int $value
     */
    public function setPoints(int $value): self
    {
        $this->points = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpiresAt(): string
    {
        return $this->expiresAt;
    }

    /**
     * @param string $value
     */
    public function setExpiresAt(string $value): self
    {
        $this->expiresAt = $value;
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
