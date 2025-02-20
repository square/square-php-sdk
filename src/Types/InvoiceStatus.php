<?php

namespace Square\Types;

enum InvoiceStatus: string
{
    case Draft = "DRAFT";
    case Unpaid = "UNPAID";
    case Scheduled = "SCHEDULED";
    case PartiallyPaid = "PARTIALLY_PAID";
    case Paid = "PAID";
    case PartiallyRefunded = "PARTIALLY_REFUNDED";
    case Refunded = "REFUNDED";
    case Canceled = "CANCELED";
    case Failed = "FAILED";
    case PaymentPending = "PAYMENT_PENDING";
}
