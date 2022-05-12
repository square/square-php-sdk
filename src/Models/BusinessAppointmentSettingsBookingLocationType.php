<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Supported types of location where service is provided.
 */
class BusinessAppointmentSettingsBookingLocationType
{
    /**
     * The service is provided at a seller location.
     */
    public const BUSINESS_LOCATION = 'BUSINESS_LOCATION';

    /**
     * The service is provided at a customer location.
     */
    public const CUSTOMER_LOCATION = 'CUSTOMER_LOCATION';

    /**
     * The service is provided over the phone.
     */
    public const PHONE = 'PHONE';

    private const _ALL_VALUES = [self::BUSINESS_LOCATION, self::CUSTOMER_LOCATION, self::PHONE];

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
