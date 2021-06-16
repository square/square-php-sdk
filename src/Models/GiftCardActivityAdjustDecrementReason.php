<?php

declare(strict_types=1);

namespace Square\Models;

class GiftCardActivityAdjustDecrementReason
{
    /**
     * The seller determined suspicious activity by the buyer.
     */
    public const SUSPICIOUS_ACTIVITY = 'SUSPICIOUS_ACTIVITY';

    /**
     * The seller previously increased the gift card balance by accident.
     */
    public const BALANCE_ACCIDENTALLY_INCREASED = 'BALANCE_ACCIDENTALLY_INCREASED';

    /**
     * The seller decreased the gift card balance to
     * accommodate support issues.
     */
    public const SUPPORT_ISSUE = 'SUPPORT_ISSUE';
}
