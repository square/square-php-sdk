<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

class MerchantStatus
{
    /**
     * A fully operational merchant account. The merchant can interact with Square products and APIs.
     */
    public const ACTIVE = 'ACTIVE';

    /**
     * A functionally limited merchant account. The merchant can only have limited interaction
     * via Square APIs. The merchant cannot log in or access the seller dashboard.
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
