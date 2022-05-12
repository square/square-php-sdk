<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Supported sources a booking was created from.
 */
class BookingBookingSource
{
    /**
     * The booking was created by a seller from a Square Appointments application, such as the Square
     * Appointments Dashboard or a Square Appointments mobile app.
     */
    public const FIRST_PARTY_MERCHANT = 'FIRST_PARTY_MERCHANT';

    /**
     * The booking was created by a buyer from a Square Appointments application, such as Square Online
     * Booking Site.
     */
    public const FIRST_PARTY_BUYER = 'FIRST_PARTY_BUYER';

    /**
     * The booking was created by a buyer created from a third-party application.
     */
    public const THIRD_PARTY_BUYER = 'THIRD_PARTY_BUYER';

    /**
     * The booking was created by a seller or a buyer from the Square Bookings API.
     */
    public const API = 'API';

    private const _ALL_VALUES = [
        self::FIRST_PARTY_MERCHANT,
        self::FIRST_PARTY_BUYER,
        self::THIRD_PARTY_BUYER,
        self::API,
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
