<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Enumerates the `Shift` fields to sort on.
 */
class ShiftSortField
{
    /**
     * The start date/time of a `Shift`
     */
    public const START_AT = 'START_AT';

    /**
     * The end date/time of a `Shift`
     */
    public const END_AT = 'END_AT';

    /**
     * The date/time that a `Shift` is created
     */
    public const CREATED_AT = 'CREATED_AT';

    /**
     * The most recent date/time that a `Shift` is updated
     */
    public const UPDATED_AT = 'UPDATED_AT';

    private const _ALL_VALUES = [self::START_AT, self::END_AT, self::CREATED_AT, self::UPDATED_AT];

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
