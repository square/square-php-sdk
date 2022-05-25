<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * Defines supported stock levels of the item inventory.
 */
class SearchCatalogItemsRequestStockLevel
{
    /**
     * The item inventory is empty.
     */
    public const OUT = 'OUT';

    /**
     * The item inventory is low.
     */
    public const LOW = 'LOW';

    private const _ALL_VALUES = [self::OUT, self::LOW];

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
