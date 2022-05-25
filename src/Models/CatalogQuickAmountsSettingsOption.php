<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * Determines a seller's option on Quick Amounts feature.
 */
class CatalogQuickAmountsSettingsOption
{
    /**
     * Option for seller to disable Quick Amounts.
     */
    public const DISABLED = 'DISABLED';

    /**
     * Option for seller to choose manually created Quick Amounts.
     */
    public const MANUAL = 'MANUAL';

    /**
     * Option for seller to choose automatically created Quick Amounts.
     */
    public const AUTO = 'AUTO';

    private const _ALL_VALUES = [self::DISABLED, self::MANUAL, self::AUTO];

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
