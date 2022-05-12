<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Time units of a service duration for bookings.
 */
class BusinessAppointmentSettingsAlignmentTime
{
    /**
     * The service duration unit is one visit of a fixed time interval specified by the seller.
     */
    public const SERVICE_DURATION = 'SERVICE_DURATION';

    /**
     * The service duration unit is a 15-minute interval. Bookings can be scheduled every quarter hour.
     */
    public const QUARTER_HOURLY = 'QUARTER_HOURLY';

    /**
     * The service duration unit is a 30-minute interval. Bookings can be scheduled every half hour.
     */
    public const HALF_HOURLY = 'HALF_HOURLY';

    /**
     * The service duration unit is a 60-minute interval. Bookings can be scheduled every hour.
     */
    public const HOURLY = 'HOURLY';

    private const _ALL_VALUES = [self::SERVICE_DURATION, self::QUARTER_HOURLY, self::HALF_HOURLY, self::HOURLY];

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
