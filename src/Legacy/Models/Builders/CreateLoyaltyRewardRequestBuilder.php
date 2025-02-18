<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateLoyaltyRewardRequest;
use Square\Legacy\Models\LoyaltyReward;

/**
 * Builder for model CreateLoyaltyRewardRequest
 *
 * @see CreateLoyaltyRewardRequest
 */
class CreateLoyaltyRewardRequestBuilder
{
    /**
     * @var CreateLoyaltyRewardRequest
     */
    private $instance;

    private function __construct(CreateLoyaltyRewardRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Loyalty Reward Request Builder object.
     *
     * @param LoyaltyReward $reward
     * @param string $idempotencyKey
     */
    public static function init(LoyaltyReward $reward, string $idempotencyKey): self
    {
        return new self(new CreateLoyaltyRewardRequest($reward, $idempotencyKey));
    }

    /**
     * Initializes a new Create Loyalty Reward Request object.
     */
    public function build(): CreateLoyaltyRewardRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
