<?php

namespace Square\Loyalty\Rewards\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class RedeemLoyaltyRewardRequest extends JsonSerializableType
{
    /**
     * @var string $rewardId The ID of the [loyalty reward](entity:LoyaltyReward) to redeem.
     */
    private string $rewardId;

    /**
     * A unique string that identifies this `RedeemLoyaltyReward` request.
     * Keys can be any valid string, but must be unique for every request.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @var string $locationId The ID of the [location](entity:Location) where the reward is redeemed.
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * @param array{
     *   rewardId: string,
     *   idempotencyKey: string,
     *   locationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->rewardId = $values['rewardId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->locationId = $values['locationId'];
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

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }
}
