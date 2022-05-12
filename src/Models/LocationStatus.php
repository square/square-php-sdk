<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * A location's status.
 */
class LocationStatus
{
    /**
     * A location that is active for business.
     */
    public const ACTIVE = 'ACTIVE';

    /**
     * A location that is not active for business. Inactive locations provide historical
     * information. Hide inactive locations unless the user has requested to see them.
     */
    public const INACTIVE = 'INACTIVE';

    private const _ALL_VALUES = [self::ACTIVE, self::INACTIVE];

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
