<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Indicates the scope of the reward tier.
 */
class LoyaltyProgramRewardDefinitionScope
{
    /**
     * The discount applies to the entire order.
     */
    public const ORDER = 'ORDER';

    /**
     * The discount applies only to specific item variations.
     */
    public const ITEM_VARIATION = 'ITEM_VARIATION';

    /**
     * The discount applies only to items in the given categories.
     */
    public const CATEGORY = 'CATEGORY';
}
