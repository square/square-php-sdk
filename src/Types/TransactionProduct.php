<?php

namespace Square\Types;

enum TransactionProduct: string
{
    case Register = "REGISTER";
    case ExternalApi = "EXTERNAL_API";
    case Billing = "BILLING";
    case Appointments = "APPOINTMENTS";
    case Invoices = "INVOICES";
    case OnlineStore = "ONLINE_STORE";
    case Payroll = "PAYROLL";
    case Other = "OTHER";
}
