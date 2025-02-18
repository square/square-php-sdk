<?php

namespace Square\Loyalty\Rewards\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteRewardsRequest extends JsonSerializableType
{
    /**
     * @var string $rewardId The ID of the [loyalty reward](entity:LoyaltyReward) to delete.
     */
    private string $rewardId;

    /**
     * @param array{
     *   rewardId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->rewardId = $values['rewardId'];
    }

    /**
     * @return string
     */
    public function getRewardId(): string
    {
        return $this->rewardId;
    }

    /**
     * @param string $value
     */
    public function setRewardId(string $value): self
    {
        $this->rewardId = $value;
        return $this;
    }
}
