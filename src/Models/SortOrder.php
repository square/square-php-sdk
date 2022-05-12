<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The order (e.g., chronological or alphabetical) in which results from a request are returned.
 */
class SortOrder
{
    /**
     * The results are returned in descending (e.g., newest-first or Z-A) order.
     */
    public const DESC = 'DESC';

    /**
     * The results are returned in ascending (e.g., oldest-first or A-Z) order.
     */
    public const ASC = 'ASC';

    private const _ALL_VALUES = [self::DESC, self::ASC];

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
