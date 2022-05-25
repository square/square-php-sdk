<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * Indicates whether the program is currently active.
 */
class LoyaltyProgramStatus
{
    /**
     * The loyalty program does not have an active subscription.
     * Loyalty API requests fail.
     */
    public const INACTIVE = 'INACTIVE';

    /**
     * The program is fully functional. The program has an active subscription.
     */
    public const ACTIVE = 'ACTIVE';

    private const _ALL_VALUES = [self::INACTIVE, self::ACTIVE];

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
