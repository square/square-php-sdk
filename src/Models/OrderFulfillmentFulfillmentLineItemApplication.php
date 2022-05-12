<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The `line_item_application` describes what order line items this fulfillment applies
 * to. It can be `ALL` or `ENTRY_LIST` with a supplied list of fulfillment entries.
 */
class OrderFulfillmentFulfillmentLineItemApplication
{
    /**
     * If `ALL`, `entries` must be unset.
     */
    public const ALL = 'ALL';

    /**
     * If `ENTRY_LIST`, supply a list of `entries`.
     */
    public const ENTRY_LIST = 'ENTRY_LIST';

    private const _ALL_VALUES = [self::ALL, self::ENTRY_LIST];

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
