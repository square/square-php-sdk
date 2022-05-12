<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * How to apply a CatalogDiscount to a CatalogItem.
 */
class CatalogDiscountType
{
    /**
     * Apply the discount as a fixed percentage (e.g., 5%) off the item price.
     */
    public const FIXED_PERCENTAGE = 'FIXED_PERCENTAGE';

    /**
     * Apply the discount as a fixed amount (e.g., $1.00) off the item price.
     */
    public const FIXED_AMOUNT = 'FIXED_AMOUNT';

    /**
     * Apply the discount as a variable percentage off the item price. The percentage will be specified at
     * the time of sale.
     */
    public const VARIABLE_PERCENTAGE = 'VARIABLE_PERCENTAGE';

    /**
     * Apply the discount as a variable amount off the item price. The amount will be specified at the
     * time of sale.
     */
    public const VARIABLE_AMOUNT = 'VARIABLE_AMOUNT';

    private const _ALL_VALUES = [
        self::FIXED_PERCENTAGE,
        self::FIXED_AMOUNT,
        self::VARIABLE_PERCENTAGE,
        self::VARIABLE_AMOUNT,
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
