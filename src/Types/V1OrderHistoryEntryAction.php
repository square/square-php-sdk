<?php

namespace Square\Types;

enum V1OrderHistoryEntryAction: string
{
    case OrderPlaced = "ORDER_PLACED";
    case Declined = "DECLINED";
    case PaymentReceived = "PAYMENT_RECEIVED";
    case Canceled = "CANCELED";
    case Completed = "COMPLETED";
    case Refunded = "REFUNDED";
    case Expired = "EXPIRED";
}
