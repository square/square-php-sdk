<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a reward that can be applied to an order if the necessary
 * reward tier criteria are met. Rewards are created through the Loyalty API.
 */
class OrderReward implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $rewardTierId;

    /**
     * @param string $id
     * @param string $rewardTierId
     */
    public function __construct(string $id, string $rewardTierId)
    {
        $this->id = $id;
        $this->rewardTierId = $rewardTierId;
    }

    /**
     * Returns Id.
     *
     * The identifier of the reward.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The identifier of the reward.
     *
     * @required
     * @maps id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Reward Tier Id.
     *
     * The identifier of the reward tier corresponding to this reward.
     */
    public function getRewardTierId(): string
    {
        return $this->rewardTierId;
    }

    /**
     * Sets Reward Tier Id.
     *
     * The identifier of the reward tier corresponding to this reward.
     *
     * @required
     * @maps reward_tier_id
     */
    public function setRewardTierId(string $rewardTierId): void
    {
        $this->rewardTierId = $rewardTierId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']             = $this->id;
        $json['reward_tier_id'] = $this->rewardTierId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
