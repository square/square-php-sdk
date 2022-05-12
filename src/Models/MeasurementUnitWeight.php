<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Unit of weight used to measure a quantity.
 */
class MeasurementUnitWeight
{
    /**
     * The weight is measured in ounces.
     */
    public const IMPERIAL_WEIGHT_OUNCE = 'IMPERIAL_WEIGHT_OUNCE';

    /**
     * The weight is measured in pounds.
     */
    public const IMPERIAL_POUND = 'IMPERIAL_POUND';

    /**
     * The weight is measured in stones.
     */
    public const IMPERIAL_STONE = 'IMPERIAL_STONE';

    /**
     * The weight is measured in milligrams.
     */
    public const METRIC_MILLIGRAM = 'METRIC_MILLIGRAM';

    /**
     * The weight is measured in grams.
     */
    public const METRIC_GRAM = 'METRIC_GRAM';

    /**
     * The weight is measured in kilograms.
     */
    public const METRIC_KILOGRAM = 'METRIC_KILOGRAM';

    private const _ALL_VALUES = [
        self::IMPERIAL_WEIGHT_OUNCE,
        self::IMPERIAL_POUND,
        self::IMPERIAL_STONE,
        self::METRIC_MILLIGRAM,
        self::METRIC_GRAM,
        self::METRIC_KILOGRAM,
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
