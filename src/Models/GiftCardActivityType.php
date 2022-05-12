<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates the gift card activity type.
 */
class GiftCardActivityType
{
    /**
     * Activated a gift card with a balance.
     */
    public const ACTIVATE = 'ACTIVATE';

    /**
     * Loaded a gift card with additional funds.
     */
    public const LOAD = 'LOAD';

    /**
     * Redeemed a gift card.
     */
    public const REDEEM = 'REDEEM';

    /**
     * Cleared a gift card balance to zero.
     */
    public const CLEAR_BALANCE = 'CLEAR_BALANCE';

    /**
     * Permanently blocked a gift card from a balance-changing
     * activity.
     */
    public const DEACTIVATE = 'DEACTIVATE';

    /**
     * Manually increased a gift card balance.
     */
    public const ADJUST_INCREMENT = 'ADJUST_INCREMENT';

    /**
     * Manually decreased a gift card balance.
     */
    public const ADJUST_DECREMENT = 'ADJUST_DECREMENT';

    /**
     * Added money to a gift card because a transaction
     * paid with this gift card was refunded.
     */
    public const REFUND = 'REFUND';

    /**
     * Added money to a gift card because a transaction
     * not linked to this gift card was refunded
     * to this gift card.
     */
    public const UNLINKED_ACTIVITY_REFUND = 'UNLINKED_ACTIVITY_REFUND';

    /**
     * Imported a third-party gift card.
     */
    public const IMPORT = 'IMPORT';

    /**
     * Temporarily blocked a gift card from balance-changing
     * activities.
     */
    public const BLOCK = 'BLOCK';

    /**
     * Unblocked a gift card. It can resume balance-changing activities.
     */
    public const UNBLOCK = 'UNBLOCK';

    /**
     * A third-party gift card was imported with a balance.
     * The import is reversed.
     */
    public const IMPORT_REVERSAL = 'IMPORT_REVERSAL';

    private const _ALL_VALUES = [
        self::ACTIVATE,
        self::LOAD,
        self::REDEEM,
        self::CLEAR_BALANCE,
        self::DEACTIVATE,
        self::ADJUST_INCREMENT,
        self::ADJUST_DECREMENT,
        self::REFUND,
        self::UNLINKED_ACTIVITY_REFUND,
        self::IMPORT,
        self::BLOCK,
        self::UNBLOCK,
        self::IMPORT_REVERSAL,
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
