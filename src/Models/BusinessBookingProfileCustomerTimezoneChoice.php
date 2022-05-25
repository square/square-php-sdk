<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * Choices of customer-facing time zone used for bookings.
 */
class BusinessBookingProfileCustomerTimezoneChoice
{
    /**
     * Use the time zone of the business location for bookings.
     */
    public const BUSINESS_LOCATION_TIMEZONE = 'BUSINESS_LOCATION_TIMEZONE';

    /**
     * Use the customer-chosen time zone for bookings.
     */
    public const CUSTOMER_CHOICE = 'CUSTOMER_CHOICE';

    private const _ALL_VALUES = [self::BUSINESS_LOCATION_TIMEZONE, self::CUSTOMER_CHOICE];

    /**
     * Ensures that all the given values are present in this Enum.
     *
     * @param array|stdClass|null|string $value Value or a list/map of values to be checked
     *
     * @return array|null|string Input value(s), if all are a part of this Enum
     *
     * @throws Exception Throws exception if any given value is not in this Enum
     */
    public static function checkValue($value)
    {
        $value = json_decode(json_encode($value), true); // converts stdClass into array
        ApiHelper::checkValueInEnum($value, self::class, self::_ALL_VALUES);
        return $value;
    }
}
