<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Determines the type of a specific Quick Amount.
 */
class CatalogQuickAmountType
{
    /**
     * Quick Amount is created manually by the seller.
     */
    public const QUICK_AMOUNT_TYPE_MANUAL = 'QUICK_AMOUNT_TYPE_MANUAL';

    /**
     * Quick Amount is generated automatically by machine learning algorithms.
     */
    public const QUICK_AMOUNT_TYPE_AUTO = 'QUICK_AMOUNT_TYPE_AUTO';

    private const _ALL_VALUES = [self::QUICK_AMOUNT_TYPE_MANUAL, self::QUICK_AMOUNT_TYPE_AUTO];

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
