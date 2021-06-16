<?php

declare(strict_types=1);

namespace Square\Models;

class GiftCardActivityClearBalanceReason
{
    /**
     * The seller suspects suspicious activity.
     */
    public const SUSPICIOUS_ACTIVITY = 'SUSPICIOUS_ACTIVITY';

    /**
     * The seller cleared the balance to reuse the gift card.
     */
    public const REUSE_GIFTCARD = 'REUSE_GIFTCARD';

    /**
     * The gift card balance was cleared for an unknown reason.
     */
    public const UNKNOWN_REASON = 'UNKNOWN_REASON';
}
