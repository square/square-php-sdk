<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Represents the line item type.
 */
class OrderLineItemItemType
{
    /**
     * Indicates that the line item is an itemized sale.
     */
    public const ITEM = 'ITEM';

    /**
     * Indicates that the line item is a non-itemized sale.
     */
    public const CUSTOM_AMOUNT = 'CUSTOM_AMOUNT';

    /**
     * Indicates that the line item is a gift card sale. Gift cards sold through
     * the Orders API are sold in an unactivated state and can be activated through the
     * Gift Cards API using the line item `uid`.
     */
    public const GIFT_CARD = 'GIFT_CARD';

    private const _ALL_VALUES = [self::ITEM, self::CUSTOM_AMOUNT, self::GIFT_CARD];

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
