<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The type of discount the reward tier offers.
 */
class LoyaltyProgramRewardDefinitionType
{
    /**
     * The fixed amount discounted.
     */
    public const FIXED_AMOUNT = 'FIXED_AMOUNT';

    /**
     * The fixed percentage discounted.
     */
    public const FIXED_PERCENTAGE = 'FIXED_PERCENTAGE';
}
