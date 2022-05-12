<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Unit of time used to measure a quantity (a duration).
 */
class MeasurementUnitTime
{
    /**
     * The time is measured in milliseconds.
     */
    public const GENERIC_MILLISECOND = 'GENERIC_MILLISECOND';

    /**
     * The time is measured in seconds.
     */
    public const GENERIC_SECOND = 'GENERIC_SECOND';

    /**
     * The time is measured in minutes.
     */
    public const GENERIC_MINUTE = 'GENERIC_MINUTE';

    /**
     * The time is measured in hours.
     */
    public const GENERIC_HOUR = 'GENERIC_HOUR';

    /**
     * The time is measured in days.
     */
    public const GENERIC_DAY = 'GENERIC_DAY';

    private const _ALL_VALUES = [
        self::GENERIC_MILLISECOND,
        self::GENERIC_SECOND,
        self::GENERIC_MINUTE,
        self::GENERIC_HOUR,
        self::GENERIC_DAY,
    ];

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
