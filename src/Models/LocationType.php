<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * A location's type.
 */
class LocationType
{
    /**
     * A place of business with a physical location.
     */
    public const PHYSICAL = 'PHYSICAL';

    /**
     * A place of business that is mobile, such as a food truck or online store.
     */
    public const MOBILE = 'MOBILE';

    private const _ALL_VALUES = [self::PHYSICAL, self::MOBILE];

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
