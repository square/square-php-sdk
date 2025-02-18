<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Provides metadata when the event `type` is `OTHER`.
 */
class LoyaltyEventOther extends JsonSerializableType
{
    /**
     * @var string $loyaltyProgramId The Square-assigned ID of the [loyalty program](entity:LoyaltyProgram).
     */
    #[JsonProperty('loyalty_program_id')]
    private string $loyaltyProgramId;

    /**
     * @var int $points The number of points added or removed.
     */
    #[JsonProperty('points')]
    private int $points;

    /**
     * @param array{
     *   loyaltyProgramId: string,
     *   points: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->loyaltyProgramId = $values['loyaltyProgramId'];
        $this->points = $values['points'];
    }

    /**
     * @return string
     */
    public function getLoyaltyProgramId(): string
    {
        return $this->loyaltyProgramId;
    }

    /**
     * @param string $value
     */
    public function setLoyaltyProgramId(string $value): self
    {
        $this->loyaltyProgramId = $value;
        return $this;
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
    public function __toString(): string
    {
        return $this->toJson();
    }
}
