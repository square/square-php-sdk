<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * Determines item visibility in Ecom (Online Store) and Online Checkout.
 */
class EcomVisibility
{
    /**
     * Item is not synced with Ecom (Weebly). This is the default state
     */
    public const UNINDEXED = 'UNINDEXED';

    /**
     * Item is synced but is unavailable within Ecom (Weebly) and Online Checkout
     */
    public const UNAVAILABLE = 'UNAVAILABLE';

    /**
     * Option for seller to choose manually created Quick Amounts.
     */
    public const HIDDEN = 'HIDDEN';

    /**
     * Item is synced but available within Ecom (Weebly) and Online Checkout but is hidden from Ecom Store.
     */
    public const VISIBLE = 'VISIBLE';

    private const _ALL_VALUES = [self::UNINDEXED, self::UNAVAILABLE, self::HIDDEN, self::VISIBLE];

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
