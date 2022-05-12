<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The field to sort the returned [Vendor]($m/Vendor) objects by.
 */
class SearchVendorsRequestSortField
{
    /**
     * To sort the result by the name of the [Vendor]($m/Vendor) objects.
     */
    public const NAME = 'NAME';

    /**
     * To sort the result by the creation time of the [Vendor]($m/Vendor) objects.
     */
    public const CREATED_AT = 'CREATED_AT';

    private const _ALL_VALUES = [self::NAME, self::CREATED_AT];

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
