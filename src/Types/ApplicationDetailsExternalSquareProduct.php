<?php

namespace Square\Types;

enum ApplicationDetailsExternalSquareProduct: string
{
    case Appointments = "APPOINTMENTS";
    case EcommerceApi = "ECOMMERCE_API";
    case Invoices = "INVOICES";
    case OnlineStore = "ONLINE_STORE";
    case Other = "OTHER";
    case Restaurants = "RESTAURANTS";
    case Retail = "RETAIL";
    case SquarePos = "SQUARE_POS";
    case TerminalApi = "TERMINAL_API";
    case VirtualTerminal = "VIRTUAL_TERMINAL";
}
