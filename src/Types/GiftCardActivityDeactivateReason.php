<?php

namespace Square\Types;

enum GiftCardActivityDeactivateReason: string
{
    case SuspiciousActivity = "SUSPICIOUS_ACTIVITY";
    case UnknownReason = "UNKNOWN_REASON";
    case ChargebackDeactivate = "CHARGEBACK_DEACTIVATE";
}
