<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The unit of length used to measure a quantity.
 */
class MeasurementUnitLength
{
    /**
     * The length is measured in inches.
     */
    public const IMPERIAL_INCH = 'IMPERIAL_INCH';

    /**
     * The length is measured in feet.
     */
    public const IMPERIAL_FOOT = 'IMPERIAL_FOOT';

    /**
     * The length is measured in yards.
     */
    public const IMPERIAL_YARD = 'IMPERIAL_YARD';

    /**
     * The length is measured in miles.
     */
    public const IMPERIAL_MILE = 'IMPERIAL_MILE';

    /**
     * The length is measured in millimeters.
     */
    public const METRIC_MILLIMETER = 'METRIC_MILLIMETER';

    /**
     * The length is measured in centimeters.
     */
    public const METRIC_CENTIMETER = 'METRIC_CENTIMETER';

    /**
     * The length is measured in meters.
     */
    public const METRIC_METER = 'METRIC_METER';

    /**
     * The length is measured in kilometers.
     */
    public const METRIC_KILOMETER = 'METRIC_KILOMETER';

    private const _ALL_VALUES = [
        self::IMPERIAL_INCH,
        self::IMPERIAL_FOOT,
        self::IMPERIAL_YARD,
        self::IMPERIAL_MILE,
        self::METRIC_MILLIMETER,
        self::METRIC_CENTIMETER,
        self::METRIC_METER,
        self::METRIC_KILOMETER,
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
