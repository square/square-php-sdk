<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a contract to redeem loyalty points for a [reward tier](entity:LoyaltyProgramRewardTier) discount. Loyalty rewards can be in an ISSUED, REDEEMED, or DELETED state.
 * For more information, see [Manage loyalty rewards](https://developer.squareup.com/docs/loyalty-api/loyalty-rewards).
 */
class LoyaltyReward extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-assigned ID of the loyalty reward.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The status of a loyalty reward.
     * See [LoyaltyRewardStatus](#type-loyaltyrewardstatus) for possible values
     *
     * @var ?value-of<LoyaltyRewardStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var string $loyaltyAccountId The Square-assigned ID of the [loyalty account](entity:LoyaltyAccount) to which the reward belongs.
     */
    #[JsonProperty('loyalty_account_id')]
    private string $loyaltyAccountId;

    /**
     * @var string $rewardTierId The Square-assigned ID of the [reward tier](entity:LoyaltyProgramRewardTier) used to create the reward.
     */
    #[JsonProperty('reward_tier_id')]
    private string $rewardTierId;

    /**
     * @var ?int $points The number of loyalty points used for the reward.
     */
    #[JsonProperty('points')]
    private ?int $points;

    /**
     * @var ?string $orderId The Square-assigned ID of the [order](entity:Order) to which the reward is attached.
     */
    #[JsonProperty('order_id')]
    private ?string $orderId;

    /**
     * @var ?string $createdAt The timestamp when the reward was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp when the reward was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $redeemedAt The timestamp when the reward was redeemed, in RFC 3339 format.
     */
    #[JsonProperty('redeemed_at')]
    private ?string $redeemedAt;

    /**
     * @param array{
     *   loyaltyAccountId: string,
     *   rewardTierId: string,
     *   id?: ?string,
     *   status?: ?value-of<LoyaltyRewardStatus>,
     *   points?: ?int,
     *   orderId?: ?string,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   redeemedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->loyaltyAccountId = $values['loyaltyAccountId'];
        $this->rewardTierId = $values['rewardTierId'];
        $this->points = $values['points'] ?? null;
        $this->orderId = $values['orderId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->redeemedAt = $values['redeemedAt'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?value-of<LoyaltyRewardStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<LoyaltyRewardStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLoyaltyAccountId(): string
    {
        return $this->loyaltyAccountId;
    }

    /**
     * @param string $value
     */
    public function setLoyaltyAccountId(string $value): self
    {
        $this->loyaltyAccountId = $value;
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
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRedeemedAt(): ?string
    {
        return $this->redeemedAt;
    }

    /**
     * @param ?string $value
     */
    public function setRedeemedAt(?string $value = null): self
    {
        $this->redeemedAt = $value;
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
