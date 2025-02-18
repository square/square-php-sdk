<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Describes when the loyalty program expires.
 */
class LoyaltyProgramExpirationPolicy extends JsonSerializableType
{
    /**
     * The number of months before points expire, in `P[n]M` RFC 3339 duration format. For example, a value of `P12M` represents a duration of 12 months.
     * Points are valid through the last day of the month in which they are scheduled to expire. For example, with a  `P12M` duration, points earned on July 6, 2020 expire on August 1, 2021.
     *
     * @var string $expirationDuration
     */
    #[JsonProperty('expiration_duration')]
    private string $expirationDuration;

    /**
     * @param array{
     *   expirationDuration: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->expirationDuration = $values['expirationDuration'];
    }

    /**
     * @return string
     */
    public function getExpirationDuration(): string
    {
        return $this->expirationDuration;
    }

    /**
     * @param string $value
     */
    public function setExpirationDuration(string $value): self
    {
        $this->expirationDuration = $value;
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
