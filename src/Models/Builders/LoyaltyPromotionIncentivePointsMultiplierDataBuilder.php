<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\LoyaltyPromotionIncentivePointsMultiplierData;

/**
 * Builder for model LoyaltyPromotionIncentivePointsMultiplierData
 *
 * @see LoyaltyPromotionIncentivePointsMultiplierData
 */
class LoyaltyPromotionIncentivePointsMultiplierDataBuilder
{
    /**
     * @var LoyaltyPromotionIncentivePointsMultiplierData
     */
    private $instance;

    private function __construct(LoyaltyPromotionIncentivePointsMultiplierData $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new loyalty promotion incentive points multiplier data Builder object.
     */
    public static function init(): self
    {
        return new self(new LoyaltyPromotionIncentivePointsMultiplierData());
    }

    /**
     * Sets points multiplier field.
     */
    public function pointsMultiplier(?int $value): self
    {
        $this->instance->setPointsMultiplier($value);
        return $this;
    }

    /**
     * Unsets points multiplier field.
     */
    public function unsetPointsMultiplier(): self
    {
        $this->instance->unsetPointsMultiplier();
        return $this;
    }

    /**
     * Sets multiplier field.
     */
    public function multiplier(?string $value): self
    {
        $this->instance->setMultiplier($value);
        return $this;
    }

    /**
     * Unsets multiplier field.
     */
    public function unsetMultiplier(): self
    {
        $this->instance->unsetMultiplier();
        return $this;
    }

    /**
     * Initializes a new loyalty promotion incentive points multiplier data object.
     */
    public function build(): LoyaltyPromotionIncentivePointsMultiplierData
    {
        return CoreHelper::clone($this->instance);
    }
}
