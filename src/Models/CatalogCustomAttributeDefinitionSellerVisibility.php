<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Defines the visibility of a custom attribute to sellers in Square
 * client applications, Square APIs or in Square UIs (including Square Point
 * of Sale applications and Square Dashboard).
 */
class CatalogCustomAttributeDefinitionSellerVisibility
{
    /**
     * Sellers cannot read this custom attribute in Square client
     * applications or Square APIs.
     */
    public const SELLER_VISIBILITY_HIDDEN = 'SELLER_VISIBILITY_HIDDEN';

    /**
     * Sellers can read and write this custom attribute value in catalog objects,
     * but cannot edit the custom attribute definition.
     */
    public const SELLER_VISIBILITY_READ_WRITE_VALUES = 'SELLER_VISIBILITY_READ_WRITE_VALUES';

    private const _ALL_VALUES = [self::SELLER_VISIBILITY_HIDDEN, self::SELLER_VISIBILITY_READ_WRITE_VALUES];

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
