<?php

namespace Square\Types;

enum InvoicePaymentReminderStatus: string
{
    case Pending = "PENDING";
    case NotApplicable = "NOT_APPLICABLE";
    case Sent = "SENT";
}
