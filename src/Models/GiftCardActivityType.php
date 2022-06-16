<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * Indicates the type of [gift card activity]($m/GiftCardActivity).
 */
class GiftCardActivityType
{
    /**
     * Activated a gift card with a balance. When a gift card is activated, Square changes
     * the gift card state from `PENDING` to `ACTIVE`. A gift card must be in the `ACTIVE` state
     * to be used for other balance-changing activities.
     */
    public const ACTIVATE = 'ACTIVATE';

    /**
     * Loaded a gift card with additional funds.
     */
    public const LOAD = 'LOAD';

    /**
     * Redeemed a gift card for a purchase.
     */
    public const REDEEM = 'REDEEM';

    /**
     * Set the balance of a gift card to zero.
     */
    public const CLEAR_BALANCE = 'CLEAR_BALANCE';

    /**
     * Permanently blocked a gift card from balance-changing activities.
     */
    public const DEACTIVATE = 'DEACTIVATE';

    /**
     * Added money to a gift card outside of a typical `ACTIVATE`, `LOAD`, or `REFUND` activity flow.
     */
    public const ADJUST_INCREMENT = 'ADJUST_INCREMENT';

    /**
     * Deducted money from a gift card outside of a typical `REDEEM` activity flow.
     */
    public const ADJUST_DECREMENT = 'ADJUST_DECREMENT';

    /**
     * Added money to a gift card from a refunded transaction. The refund might be linked to
     * a Square payment, depending on how the payment and refund are processed. For example:
     * - A gift card payment processed by Square can be refunded to the same gift card.
     * - A cross-tender payment processed by Square can be refunded to a gift card. The cross-tender
     * payment source can be a credit card or different gift card.
     * - A payment processed with a custom processing system (instead of the Square Payments API) can
     * be refunded to a gift card.
     */
    public const REFUND = 'REFUND';

    /**
     * Added money to a gift card from a refunded transaction that is not linked to the gift card.
     *
     * This activity type is included for backward compatibility and should not be used to create a refund.
     * Instead, use the `REFUND` activity type.
     */
    public const UNLINKED_ACTIVITY_REFUND = 'UNLINKED_ACTIVITY_REFUND';

    /**
     * Imported a third-party gift card with a balance. `IMPORT` activities are managed
     * by Square and cannot be created using the Gift Card Activities API.
     */
    public const IMPORT = 'IMPORT';

    /**
     * Temporarily blocked a gift card from balance-changing activities. `BLOCK` activities
     * are managed by Square and cannot be created using the Gift Card Activities API.
     */
    public const BLOCK = 'BLOCK';

    /**
     * Unblocked a gift card, which enables it to resume balance-changing activities. `UNBLOCK`
     * activities are managed by Square and cannot be created using the Gift Card Activities API.
     */
    public const UNBLOCK = 'UNBLOCK';

    /**
     * Reversed the import of a third-party gift card, which sets the gift card state to
     * `PENDING` and clears the balance. `IMPORT_REVERSAL` activities are managed by Square and
     * cannot be created using the Gift Card Activities API.
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
