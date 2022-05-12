<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Supported types of a booking creator.
 */
class BookingCreatorDetailsCreatorType
{
    /**
     * The creator is of the seller type.
     */
    public const TEAM_MEMBER = 'TEAM_MEMBER';

    /**
     * The creator is of the buyer type.
     */
    public const CUSTOMER = 'CUSTOMER';

    private const _ALL_VALUES = [self::TEAM_MEMBER, self::CUSTOMER];

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
