<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The state of the order.
 */
class OrderState
{
    /**
     * Indicates that the order is open. Open orders can be updated.
     */
    public const OPEN = 'OPEN';

    /**
     * Indicates that the order is completed. Completed orders are fully paid. This is a terminal state.
     */
    public const COMPLETED = 'COMPLETED';

    /**
     * Indicates that the order is canceled. Canceled orders are not paid. This is a terminal state.
     */
    public const CANCELED = 'CANCELED';

    /**
     * Indicates that the order is in a draft state. Draft orders can be updated,
     * but cannot be paid or fulfilled.
     * For more information, see [Create Orders](https://developer.squareup.com/docs/orders-api/create-
     * orders).
     */
    public const DRAFT = 'DRAFT';

    private const _ALL_VALUES = [self::OPEN, self::COMPLETED, self::CANCELED, self::DRAFT];

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
