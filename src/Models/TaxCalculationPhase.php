<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * When to calculate the taxes due on a cart.
 */
class TaxCalculationPhase
{
    /**
     * The fee is calculated based on the payment's subtotal.
     */
    public const TAX_SUBTOTAL_PHASE = 'TAX_SUBTOTAL_PHASE';

    /**
     * The fee is calculated based on the payment's total.
     */
    public const TAX_TOTAL_PHASE = 'TAX_TOTAL_PHASE';

    private const _ALL_VALUES = [self::TAX_SUBTOTAL_PHASE, self::TAX_TOTAL_PHASE];

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
