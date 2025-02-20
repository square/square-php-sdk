<?php

namespace Square\Types;

enum CashDrawerEventType: string
{
    case NoSale = "NO_SALE";
    case CashTenderPayment = "CASH_TENDER_PAYMENT";
    case OtherTenderPayment = "OTHER_TENDER_PAYMENT";
    case CashTenderCancelledPayment = "CASH_TENDER_CANCELLED_PAYMENT";
    case OtherTenderCancelledPayment = "OTHER_TENDER_CANCELLED_PAYMENT";
    case CashTenderRefund = "CASH_TENDER_REFUND";
    case OtherTenderRefund = "OTHER_TENDER_REFUND";
    case PaidIn = "PAID_IN";
    case PaidOut = "PAID_OUT";
}
