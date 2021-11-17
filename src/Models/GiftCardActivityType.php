<?php

declare(strict_types=1);

namespace Square\Models;

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
}
