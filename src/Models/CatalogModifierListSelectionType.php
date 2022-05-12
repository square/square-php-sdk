<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates whether a CatalogModifierList supports multiple selections.
 */
class CatalogModifierListSelectionType
{
    /**
     * Indicates that a CatalogModifierList allows only a
     * single CatalogModifier to be selected.
     */
    public const SINGLE = 'SINGLE';

    /**
     * Indicates that a CatalogModifierList allows multiple
     * CatalogModifier to be selected.
     */
    public const MULTIPLE = 'MULTIPLE';

    private const _ALL_VALUES = [self::SINGLE, self::MULTIPLE];

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
