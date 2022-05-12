<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

class CatalogDiscountModifyTaxBasis
{
    /**
     * Application of the discount will modify the tax basis.
     */
    public const MODIFY_TAX_BASIS = 'MODIFY_TAX_BASIS';

    /**
     * Application of the discount will not modify the tax basis.
     */
    public const DO_NOT_MODIFY_TAX_BASIS = 'DO_NOT_MODIFY_TAX_BASIS';

    private const _ALL_VALUES = [self::MODIFY_TAX_BASIS, self::DO_NOT_MODIFY_TAX_BASIS];

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
