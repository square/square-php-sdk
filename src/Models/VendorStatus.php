<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The status of the [Vendor]($m/Vendor),
 * whether a [Vendor]($m/Vendor) is active or inactive.
 */
class VendorStatus
{
    /**
     * Vendor is active and can receive purchase orders.
     */
    public const ACTIVE = 'ACTIVE';

    /**
     * Vendor is inactive and cannot receive purchase orders.
     */
    public const INACTIVE = 'INACTIVE';

    private const _ALL_VALUES = [self::ACTIVE, self::INACTIVE];

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
