<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\LoyaltyPromotionIncentivePointsAdditionData;

/**
 * Builder for model LoyaltyPromotionIncentivePointsAdditionData
 *
 * @see LoyaltyPromotionIncentivePointsAdditionData
 */
class LoyaltyPromotionIncentivePointsAdditionDataBuilder
{
    /**
     * @var LoyaltyPromotionIncentivePointsAdditionData
     */
    private $instance;

    private function __construct(LoyaltyPromotionIncentivePointsAdditionData $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Loyalty Promotion Incentive Points Addition Data Builder object.
     *
     * @param int $pointsAddition
     */
    public static function init(int $pointsAddition): self
    {
        return new self(new LoyaltyPromotionIncentivePointsAdditionData($pointsAddition));
    }

    /**
     * Initializes a new Loyalty Promotion Incentive Points Addition Data object.
     */
    public function build(): LoyaltyPromotionIncentivePointsAdditionData
    {
        return CoreHelper::clone($this->instance);
    }
}
