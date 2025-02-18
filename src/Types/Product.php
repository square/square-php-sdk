<?php

namespace Square\Types;

enum Product: string
{
    case SquarePos = "SQUARE_POS";
    case ExternalApi = "EXTERNAL_API";
    case Billing = "BILLING";
    case Appointments = "APPOINTMENTS";
    case Invoices = "INVOICES";
    case OnlineStore = "ONLINE_STORE";
    case Payroll = "PAYROLL";
    case Dashboard = "DASHBOARD";
    case ItemLibraryImport = "ITEM_LIBRARY_IMPORT";
    case Other = "OTHER";
}
