<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

class GiftCardActivityAdjustIncrementReason
{
    /**
     * Seller gifted a complimentary gift card balance increase.
     */
    public const COMPLIMENTARY = 'COMPLIMENTARY';

    /**
     * The seller increased the gift card balance
     * to accommodate support issues.
     */
    public const SUPPORT_ISSUE = 'SUPPORT_ISSUE';

    /**
     * The transaction is voided.
     */
    public const TRANSACTION_VOIDED = 'TRANSACTION_VOIDED';

    private const _ALL_VALUES = [self::COMPLIMENTARY, self::SUPPORT_ISSUE, self::TRANSACTION_VOIDED];

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
