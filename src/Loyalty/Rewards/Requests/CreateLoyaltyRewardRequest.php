<?php

namespace Square\Loyalty\Rewards\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\LoyaltyReward;
use Square\Core\Json\JsonProperty;

class CreateLoyaltyRewardRequest extends JsonSerializableType
{
    /**
     * @var LoyaltyReward $reward The reward to create.
     */
    #[JsonProperty('reward')]
    private LoyaltyReward $reward;

    /**
     * A unique string that identifies this `CreateLoyaltyReward` request.
     * Keys can be any valid string, but must be unique for every request.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @param array{
     *   reward: LoyaltyReward,
     *   idempotencyKey: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->reward = $values['reward'];
        $this->idempotencyKey = $values['idempotencyKey'];
    }

    /**
     * @return LoyaltyReward
     */
    public function getReward(): LoyaltyReward
    {
        return $this->reward;
    }

    /**
     * @param LoyaltyReward $value
     */
    public function setReward(LoyaltyReward $value): self
    {
        $this->reward = $value;
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
}
