<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Provides metadata when the event `type` is `REDEEM_REWARD`.
 */
class LoyaltyEventRedeemReward implements \JsonSerializable
{
    /**
     * @var string
     */
    private $loyaltyProgramId;

    /**
     * @var string|null
     */
    private $rewardId;

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @param string $loyaltyProgramId
     */
    public function __construct(string $loyaltyProgramId)
    {
        $this->loyaltyProgramId = $loyaltyProgramId;
    }

    /**
     * Returns Loyalty Program Id.
     *
     * The ID of the [loyalty program](#type-LoyaltyProgram).
     */
    public function getLoyaltyProgramId(): string
    {
        return $this->loyaltyProgramId;
    }

    /**
     * Sets Loyalty Program Id.
     *
     * The ID of the [loyalty program](#type-LoyaltyProgram).
     *
     * @required
     * @maps loyalty_program_id
     */
    public function setLoyaltyProgramId(string $loyaltyProgramId): void
    {
        $this->loyaltyProgramId = $loyaltyProgramId;
    }

    /**
     * Returns Reward Id.
     *
     * The ID of the redeemed [loyalty reward](#type-LoyaltyReward).
     * This field is returned only if the event source is `LOYALTY_API`.
     */
    public function getRewardId(): ?string
    {
        return $this->rewardId;
    }

    /**
     * Sets Reward Id.
     *
     * The ID of the redeemed [loyalty reward](#type-LoyaltyReward).
     * This field is returned only if the event source is `LOYALTY_API`.
     *
     * @maps reward_id
     */
    public function setRewardId(?string $rewardId): void
    {
        $this->rewardId = $rewardId;
    }

    /**
     * Returns Order Id.
     *
     * The ID of the [order](#type-Order) that redeemed the reward.
     * This field is returned only if the Orders API is used to process orders.
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The ID of the [order](#type-Order) that redeemed the reward.
     * This field is returned only if the Orders API is used to process orders.
     *
     * @maps order_id
     */
    public function setOrderId(?string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['loyalty_program_id'] = $this->loyaltyProgramId;
        $json['reward_id']        = $this->rewardId;
        $json['order_id']         = $this->orderId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
