<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates how the inventory change was applied to a tracked product quantity.
 */
class InventoryChangeType
{
    /**
     * The change occurred as part of a physical count update.
     */
    public const PHYSICAL_COUNT = 'PHYSICAL_COUNT';

    /**
     * The change occurred as part of the normal lifecycle of goods
     * (e.g., as an inventory adjustment).
     */
    public const ADJUSTMENT = 'ADJUSTMENT';

    /**
     * The change occurred as part of an inventory transfer.
     */
    public const TRANSFER = 'TRANSFER';

    private const _ALL_VALUES = [self::PHYSICAL_COUNT, self::ADJUSTMENT, self::TRANSFER];

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
