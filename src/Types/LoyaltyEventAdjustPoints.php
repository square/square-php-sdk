<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Provides metadata when the event `type` is `ADJUST_POINTS`.
 */
class LoyaltyEventAdjustPoints extends JsonSerializableType
{
    /**
     * @var ?string $loyaltyProgramId The Square-assigned ID of the [loyalty program](entity:LoyaltyProgram).
     */
    #[JsonProperty('loyalty_program_id')]
    private ?string $loyaltyProgramId;

    /**
     * @var int $points The number of points added or removed.
     */
    #[JsonProperty('points')]
    private int $points;

    /**
     * @var ?string $reason The reason for the adjustment of points.
     */
    #[JsonProperty('reason')]
    private ?string $reason;

    /**
     * @param array{
     *   points: int,
     *   loyaltyProgramId?: ?string,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->loyaltyProgramId = $values['loyaltyProgramId'] ?? null;
        $this->points = $values['points'];
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getLoyaltyProgramId(): ?string
    {
        return $this->loyaltyProgramId;
    }

    /**
     * @param ?string $value
     */
    public function setLoyaltyProgramId(?string $value = null): self
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
     * @return ?string
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @param ?string $value
     */
    public function setReason(?string $value = null): self
    {
        $this->reason = $value;
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
