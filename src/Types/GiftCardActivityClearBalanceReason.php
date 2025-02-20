<?php

namespace Square\Types;

enum GiftCardActivityClearBalanceReason: string
{
    case SuspiciousActivity = "SUSPICIOUS_ACTIVITY";
    case ReuseGiftcard = "REUSE_GIFTCARD";
    case UnknownReason = "UNKNOWN_REASON";
}
