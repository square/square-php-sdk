<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates whether customers should be included in, or excluded from,
 * the result set when they match the filtering criteria.
 */
class CustomerInclusionExclusion
{
    /**
     * Customers should be included in the result set when they match the
     * filtering criteria.
     */
    public const INCLUDE_ = 'INCLUDE';

    /**
     * Customers should be excluded from the result set when they match
     * the filtering criteria.
     */
    public const EXCLUDE = 'EXCLUDE';

    private const _ALL_VALUES = [self::INCLUDE_, self::EXCLUDE];

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
