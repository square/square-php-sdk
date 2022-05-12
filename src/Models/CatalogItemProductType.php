<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The type of a CatalogItem. Connect V2 only allows the creation of `REGULAR` or
 * `APPOINTMENTS_SERVICE` items.
 */
class CatalogItemProductType
{
    /**
     * An ordinary item.
     */
    public const REGULAR = 'REGULAR';

    /**
     * A Square gift card.
     */
    public const GIFT_CARD = 'GIFT_CARD';

    /**
     * A service that can be booked using the Square Appointments app.
     */
    public const APPOINTMENTS_SERVICE = 'APPOINTMENTS_SERVICE';

    private const _ALL_VALUES = [self::REGULAR, self::GIFT_CARD, self::APPOINTMENTS_SERVICE];

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
