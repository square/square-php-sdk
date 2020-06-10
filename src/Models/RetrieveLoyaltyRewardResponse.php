<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A response that includes the loyalty reward.
 */
class RetrieveLoyaltyRewardResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var LoyaltyReward|null
     */
    private $reward;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Reward.
     */
    public function getReward(): ?LoyaltyReward
    {
        return $this->reward;
    }

    /**
     * Sets Reward.
     *
     * @maps reward
     */
    public function setReward(?LoyaltyReward $reward): void
    {
        $this->reward = $reward;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['errors'] = $this->errors;
        $json['reward'] = $this->reward;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
