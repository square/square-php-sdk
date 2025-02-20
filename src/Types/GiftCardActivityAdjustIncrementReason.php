<?php

namespace Square\Types;

enum GiftCardActivityAdjustIncrementReason: string
{
    case Complimentary = "COMPLIMENTARY";
    case SupportIssue = "SUPPORT_ISSUE";
    case TransactionVoided = "TRANSACTION_VOIDED";
}
