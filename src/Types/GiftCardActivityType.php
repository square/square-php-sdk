<?php

namespace Square\Types;

enum GiftCardActivityType: string
{
    case Activate = "ACTIVATE";
    case Load = "LOAD";
    case Redeem = "REDEEM";
    case ClearBalance = "CLEAR_BALANCE";
    case Deactivate = "DEACTIVATE";
    case AdjustIncrement = "ADJUST_INCREMENT";
    case AdjustDecrement = "ADJUST_DECREMENT";
    case Refund = "REFUND";
    case UnlinkedActivityRefund = "UNLINKED_ACTIVITY_REFUND";
    case Import = "IMPORT";
    case Block = "BLOCK";
    case Unblock = "UNBLOCK";
    case ImportReversal = "IMPORT_REVERSAL";
    case TransferBalanceFrom = "TRANSFER_BALANCE_FROM";
    case TransferBalanceTo = "TRANSFER_BALANCE_TO";
}
