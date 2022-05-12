<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Payout status types
 */
class PayoutStatus
{
    /**
     * Indicates that the payout was successfully sent to the banking destination.
     */
    public const SENT = 'SENT';

    /**
     * Indicates that the payout was rejected by the banking destination.
     */
    public const FAILED = 'FAILED';

    /**
     * Indicates that the payout has successfully completed.
     */
    public const PAID = 'PAID';

    private const _ALL_VALUES = [self::SENT, self::FAILED, self::PAID];

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
