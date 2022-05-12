<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Defines the logic used to apply a workday filter.
 */
class ShiftWorkdayMatcher
{
    /**
     * All shifts that start on or after the specified workday
     */
    public const START_AT = 'START_AT';

    /**
     * All shifts that end on or before the specified workday
     */
    public const END_AT = 'END_AT';

    /**
     * All shifts that start between the start and end workdays (inclusive)
     */
    public const INTERSECTION = 'INTERSECTION';

    private const _ALL_VALUES = [self::START_AT, self::END_AT, self::INTERSECTION];

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
