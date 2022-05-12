<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Defines the visibility of a custom attribute to applications other than their
 * creating application.
 */
class CatalogCustomAttributeDefinitionAppVisibility
{
    /**
     * Other applications cannot read this custom attribute.
     */
    public const APP_VISIBILITY_HIDDEN = 'APP_VISIBILITY_HIDDEN';

    /**
     * Other applications can read this custom attribute definition and
     * values.
     */
    public const APP_VISIBILITY_READ_ONLY = 'APP_VISIBILITY_READ_ONLY';

    /**
     * Other applications can read and write custom attribute values on objects.
     * They can read but cannot edit the custom attribute definition.
     */
    public const APP_VISIBILITY_READ_WRITE_VALUES = 'APP_VISIBILITY_READ_WRITE_VALUES';

    private const _ALL_VALUES = [
        self::APP_VISIBILITY_HIDDEN,
        self::APP_VISIBILITY_READ_ONLY,
        self::APP_VISIBILITY_READ_WRITE_VALUES,
    ];

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
