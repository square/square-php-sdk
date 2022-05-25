<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * Indicates a card's prepaid type, such as `NOT_PREPAID` or `PREPAID`.
 */
class CardPrepaidType
{
    public const UNKNOWN_PREPAID_TYPE = 'UNKNOWN_PREPAID_TYPE';

    public const NOT_PREPAID = 'NOT_PREPAID';

    public const PREPAID = 'PREPAID';

    private const _ALL_VALUES = [self::UNKNOWN_PREPAID_TYPE, self::NOT_PREPAID, self::PREPAID];

    /**
     * Ensures that all the given values are present in this Enum.
     *
     * @param array|stdClass|null|string $value Value or a list/map of values to be checked
     *
     * @return array|null|string Input value(s), if all are a part of this Enum
     *
     * @throws Exception Throws exception if any given value is not in this Enum
     */
    public static function checkValue($value)
    {
        $value = json_decode(json_encode($value), true); // converts stdClass into array
        ApiHelper::checkValueInEnum($value, self::class, self::_ALL_VALUES);
        return $value;
    }
}
