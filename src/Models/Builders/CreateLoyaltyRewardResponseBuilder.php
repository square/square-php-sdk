<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CreateLoyaltyRewardResponse;
use Square\Models\Error;
use Square\Models\LoyaltyReward;

/**
 * Builder for model CreateLoyaltyRewardResponse
 *
 * @see CreateLoyaltyRewardResponse
 */
class CreateLoyaltyRewardResponseBuilder
{
    /**
     * @var CreateLoyaltyRewardResponse
     */
    private $instance;

    private function __construct(CreateLoyaltyRewardResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Loyalty Reward Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateLoyaltyRewardResponse());
    }

    /**
     * Sets errors field.
     *
     * @param Error[]|null $value
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets reward field.
     *
     * @param LoyaltyReward|null $value
     */
    public function reward(?LoyaltyReward $value): self
    {
        $this->instance->setReward($value);
        return $this;
    }

    /**
     * Initializes a new Create Loyalty Reward Response object.
     */
    public function build(): CreateLoyaltyRewardResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
