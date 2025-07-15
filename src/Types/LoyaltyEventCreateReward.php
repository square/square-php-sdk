<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Provides metadata when the event `type` is `CREATE_REWARD`.
 */
class LoyaltyEventCreateReward extends JsonSerializableType
{
    /**
     * @var ?string $loyaltyProgramId The ID of the [loyalty program](entity:LoyaltyProgram).
     */
    #[JsonProperty('loyalty_program_id')]
    private ?string $loyaltyProgramId;

    /**
     * The Square-assigned ID of the created [loyalty reward](entity:LoyaltyReward).
     * This field is returned only if the event source is `LOYALTY_API`.
     *
     * @var ?string $rewardId
     */
    #[JsonProperty('reward_id')]
    private ?string $rewardId;

    /**
     * @var ?int $points The loyalty points used to create the reward.
     */
    #[JsonProperty('points')]
    private ?int $points;

    /**
     * @param array{
     *   loyaltyProgramId?: ?string,
     *   rewardId?: ?string,
     *   points?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->loyaltyProgramId = $values['loyaltyProgramId'] ?? null;
        $this->rewardId = $values['rewardId'] ?? null;
        $this->points = $values['points'] ?? null;
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
     * @return ?string
     */
    public function getRewardId(): ?string
    {
        return $this->rewardId;
    }

    /**
     * @param ?string $value
     */
    public function setRewardId(?string $value = null): self
    {
        $this->rewardId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * @param ?int $value
     */
    public function setPoints(?int $value = null): self
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
