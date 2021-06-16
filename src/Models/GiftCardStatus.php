<?php

declare(strict_types=1);

namespace Square\Models;

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
     * This is the state when a gift card is initially created. You must activate the gift card
     * before you can use it.
     */
    public const PENDING = 'PENDING';
}
