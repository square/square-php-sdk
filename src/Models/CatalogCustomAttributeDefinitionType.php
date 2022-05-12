<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Defines the possible types for a custom attribute.
 */
class CatalogCustomAttributeDefinitionType
{
    /**
     * A free-form string containing up to 255 characters.
     */
    public const STRING = 'STRING';

    /**
     * A `true` or `false` value.
     */
    public const BOOLEAN = 'BOOLEAN';

    /**
     * A decimal string representation of a number. Can support up to 5 digits after the decimal point.
     */
    public const NUMBER = 'NUMBER';

    /**
     * One or more choices from `allowed_selections`.
     */
    public const SELECTION = 'SELECTION';

    private const _ALL_VALUES = [self::STRING, self::BOOLEAN, self::NUMBER, self::SELECTION];

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
