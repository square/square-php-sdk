<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates the gift card state.
 */
class GiftCardStatus
{
    /**
     * The gift card is active and can be used as a payment source.
     */
    public const ACTIVE = 'ACTIVE';

    /**
     * Any activity that changes the gift card balance is permanently forbidden.
     */
    public const DEACTIVATED = 'DEACTIVATED';

    /**
     * Any activity that changes the gift card balance is temporarily forbidden.
     */
    public const BLOCKED = 'BLOCKED';

    /**
     * The gift card is pending activation.
     * This is the initial state when a gift card is created. You must activate the gift card
     * before it can be used.
     */
    public const PENDING = 'PENDING';

    private const _ALL_VALUES = [self::ACTIVE, self::DEACTIVATED, self::BLOCKED, self::PENDING];

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
