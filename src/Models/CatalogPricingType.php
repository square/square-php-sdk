<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates whether the price of a CatalogItemVariation should be entered manually at the time of
 * sale.
 */
class CatalogPricingType
{
    /**
     * The catalog item variation's price is fixed.
     */
    public const FIXED_PRICING = 'FIXED_PRICING';

    /**
     * The catalog item variation's price is entered at the time of sale.
     */
    public const VARIABLE_PRICING = 'VARIABLE_PRICING';

    private const _ALL_VALUES = [self::FIXED_PRICING, self::VARIABLE_PRICING];

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
