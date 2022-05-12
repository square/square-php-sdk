<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The type of discount the reward tier offers. DEPRECATED at version 2020-12-16. Discount details
 * are now defined using a catalog pricing rule and other catalog objects. For more information, see
 * [Getting discount details for a reward tier](https://developer.squareup.com/docs/loyalty-api/loyalty-
 * rewards#get-discount-details).
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

    private const _ALL_VALUES = [self::FIXED_AMOUNT, self::FIXED_PERCENTAGE];

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
