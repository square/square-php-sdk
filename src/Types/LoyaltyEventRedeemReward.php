<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Provides metadata when the event `type` is `REDEEM_REWARD`.
 */
class LoyaltyEventRedeemReward extends JsonSerializableType
{
    /**
     * @var ?string $loyaltyProgramId The ID of the [loyalty program](entity:LoyaltyProgram).
     */
    #[JsonProperty('loyalty_program_id')]
    private ?string $loyaltyProgramId;

    /**
     * The ID of the redeemed [loyalty reward](entity:LoyaltyReward).
     * This field is returned only if the event source is `LOYALTY_API`.
     *
     * @var ?string $rewardId
     */
    #[JsonProperty('reward_id')]
    private ?string $rewardId;

    /**
     * The ID of the [order](entity:Order) that redeemed the reward.
     * This field is returned only if the Orders API is used to process orders.
     *
     * @var ?string $orderId
     */
    #[JsonProperty('order_id')]
    private ?string $orderId;

    /**
     * @param array{
     *   loyaltyProgramId?: ?string,
     *   rewardId?: ?string,
     *   orderId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->loyaltyProgramId = $values['loyaltyProgramId'] ?? null;
        $this->rewardId = $values['rewardId'] ?? null;
        $this->orderId = $values['orderId'] ?? null;
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
     * @return ?string
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @param ?string $value
     */
    public function setOrderId(?string $value = null): self
    {
        $this->orderId = $value;
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
