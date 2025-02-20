<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a reward that can be applied to an order if the necessary
 * reward tier criteria are met. Rewards are created through the Loyalty API.
 */
class OrderReward extends JsonSerializableType
{
    /**
     * @var string $id The identifier of the reward.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $rewardTierId The identifier of the reward tier corresponding to this reward.
     */
    #[JsonProperty('reward_tier_id')]
    private string $rewardTierId;

    /**
     * @param array{
     *   id: string,
     *   rewardTierId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->rewardTierId = $values['rewardTierId'];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getRewardTierId(): string
    {
        return $this->rewardTierId;
    }

    /**
     * @param string $value
     */
    public function setRewardTierId(string $value): self
    {
        $this->rewardTierId = $value;
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
