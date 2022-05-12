<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

class GiftCardActivityAdjustDecrementReason
{
    /**
     * The seller determined suspicious activity by the buyer.
     */
    public const SUSPICIOUS_ACTIVITY = 'SUSPICIOUS_ACTIVITY';

    /**
     * The seller previously increased the gift card balance by accident.
     */
    public const BALANCE_ACCIDENTALLY_INCREASED = 'BALANCE_ACCIDENTALLY_INCREASED';

    /**
     * The seller decreased the gift card balance to
     * accommodate support issues.
     */
    public const SUPPORT_ISSUE = 'SUPPORT_ISSUE';

    private const _ALL_VALUES = [self::SUSPICIOUS_ACTIVITY, self::BALANCE_ACCIDENTALLY_INCREASED, self::SUPPORT_ISSUE];

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
