<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Represents a phase in the process of calculating order totals.
 * Service charges are applied after the indicated phase.
 *
 * [Read more about how order totals are calculated.](https://developer.squareup.com/docs/orders-
 * api/how-it-works#how-totals-are-calculated)
 */
class OrderServiceChargeCalculationPhase
{
    /**
     * The service charge is applied after discounts, but before
     * taxes.
     */
    public const SUBTOTAL_PHASE = 'SUBTOTAL_PHASE';

    /**
     * The service charge is applied after all discounts and taxes
     * are applied.
     */
    public const TOTAL_PHASE = 'TOTAL_PHASE';

    private const _ALL_VALUES = [self::SUBTOTAL_PHASE, self::TOTAL_PHASE];

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
