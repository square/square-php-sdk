<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

class GiftCardActivityDeactivateReason
{
    /**
     * The seller suspects suspicious activity.
     */
    public const SUSPICIOUS_ACTIVITY = 'SUSPICIOUS_ACTIVITY';

    /**
     * The gift card deactivated for an unknown reason.
     */
    public const UNKNOWN_REASON = 'UNKNOWN_REASON';

    /**
     * A chargeback on the gift card purchase (or the gift card load) was ruled in favor of the buyer.
     */
    public const CHARGEBACK_DEACTIVATE = 'CHARGEBACK_DEACTIVATE';

    private const _ALL_VALUES = [self::SUSPICIOUS_ACTIVITY, self::UNKNOWN_REASON, self::CHARGEBACK_DEACTIVATE];

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
