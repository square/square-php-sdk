<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Whether to the tax amount should be additional to or included in the CatalogItem price.
 */
class TaxInclusionType
{
    /**
     * The tax is an additive tax. The tax amount is added on top of the
     * CatalogItemVariation price. For example, a $1.00 item with a 10% additive
     * tax would have a total cost to the buyer of $1.10.
     */
    public const ADDITIVE = 'ADDITIVE';

    /**
     * The tax is an inclusive tax. The tax amount is included in the
     * CatalogItemVariation price. For example, a $1.00 item with a 10% inclusive
     * tax would have a total cost to the buyer of $1.00, with $0.91 (91 cents) of
     * that total being the cost of the item and $0.09 (9 cents) being tax.
     */
    public const INCLUSIVE = 'INCLUSIVE';

    private const _ALL_VALUES = [self::ADDITIVE, self::INCLUSIVE];

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
