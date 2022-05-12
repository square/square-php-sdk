<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates the scope of the reward tier. DEPRECATED at version 2020-12-16. Discount details
 * are now defined using a catalog pricing rule and other catalog objects. For more information, see
 * [Getting discount details for a reward tier](https://developer.squareup.com/docs/loyalty-api/loyalty-
 * rewards#get-discount-details).
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

    private const _ALL_VALUES = [self::ORDER, self::ITEM_VARIATION, self::CATEGORY];

    /**
     * Ensures that all the given values are present in this Enum.
     *
     * @param array|null|string $value Value or a list of values to be checked
     *
     * @return array|null|string Input value(s), if all are a part of this Enum
     *
     * @throws Exception Throws exception if any given value is not in this Enum
     */
    public static function checkValue($value)
    {
        ApiHelper::checkValueInEnum($value, self::class, self::_ALL_VALUES);
        return $value;
    }
}
