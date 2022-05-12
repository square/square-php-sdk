<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates whether this is a line-item or order-level discount.
 */
class OrderLineItemDiscountScope
{
    /**
     * Used for reporting only.
     * The original transaction discount scope is currently not supported by the API.
     */
    public const OTHER_DISCOUNT_SCOPE = 'OTHER_DISCOUNT_SCOPE';

    /**
     * The discount should be applied to only line items specified by
     * `OrderLineItemAppliedDiscount` reference records.
     */
    public const LINE_ITEM = 'LINE_ITEM';

    /**
     * The discount should be applied to the entire order.
     */
    public const ORDER = 'ORDER';

    private const _ALL_VALUES = [self::OTHER_DISCOUNT_SCOPE, self::LINE_ITEM, self::ORDER];

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
