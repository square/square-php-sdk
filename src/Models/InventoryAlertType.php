<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates whether Square should alert the merchant when the inventory quantity of a
 * CatalogItemVariation is low.
 */
class InventoryAlertType
{
    /**
     * The variation does not display an alert.
     */
    public const NONE = 'NONE';

    /**
     * The variation generates an alert when its quantity is low.
     */
    public const LOW_QUANTITY = 'LOW_QUANTITY';

    private const _ALL_VALUES = [self::NONE, self::LOW_QUANTITY];

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
