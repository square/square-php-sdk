<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates the card transaction's current status.
 */
class TenderCardDetailsStatus
{
    /**
     * The card transaction has been authorized but not yet captured.
     */
    public const AUTHORIZED = 'AUTHORIZED';

    /**
     * The card transaction was authorized and subsequently captured (i.e., completed).
     */
    public const CAPTURED = 'CAPTURED';

    /**
     * The card transaction was authorized and subsequently voided (i.e., canceled).
     */
    public const VOIDED = 'VOIDED';

    /**
     * The card transaction failed.
     */
    public const FAILED = 'FAILED';

    private const _ALL_VALUES = [self::AUTHORIZED, self::CAPTURED, self::VOIDED, self::FAILED];

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
