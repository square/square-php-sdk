<?php

namespace Square\Types;

enum GiftCardActivityAdjustDecrementReason: string
{
    case SuspiciousActivity = "SUSPICIOUS_ACTIVITY";
    case BalanceAccidentallyIncreased = "BALANCE_ACCIDENTALLY_INCREASED";
    case SupportIssue = "SUPPORT_ISSUE";
    case PurchaseWasRefunded = "PURCHASE_WAS_REFUNDED";
}
