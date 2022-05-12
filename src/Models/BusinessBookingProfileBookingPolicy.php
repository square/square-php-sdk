<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Policies for accepting bookings.
 */
class BusinessBookingProfileBookingPolicy
{
    /**
     * The seller accepts all booking requests automatically.
     */
    public const ACCEPT_ALL = 'ACCEPT_ALL';

    /**
     * The seller must accept requests to complete bookings.
     */
    public const REQUIRES_ACCEPTANCE = 'REQUIRES_ACCEPTANCE';

    private const _ALL_VALUES = [self::ACCEPT_ALL, self::REQUIRES_ACCEPTANCE];

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
