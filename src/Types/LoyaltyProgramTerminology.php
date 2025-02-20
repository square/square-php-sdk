<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the naming used for loyalty points.
 */
class LoyaltyProgramTerminology extends JsonSerializableType
{
    /**
     * @var string $one A singular unit for a point (for example, 1 point is called 1 star).
     */
    #[JsonProperty('one')]
    private string $one;

    /**
     * @var string $other A plural unit for point (for example, 10 points is called 10 stars).
     */
    #[JsonProperty('other')]
    private string $other;

    /**
     * @param array{
     *   one: string,
     *   other: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->one = $values['one'];
        $this->other = $values['other'];
    }

    /**
     * @return string
     */
    public function getOne(): string
    {
        return $this->one;
    }

    /**
     * @param string $value
     */
    public function setOne(string $value): self
    {
        $this->one = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getOther(): string
    {
        return $this->other;
    }

    /**
     * @param string $value
     */
    public function setOther(string $value): self
    {
        $this->other = $value;
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
