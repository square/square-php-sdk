<?php

namespace Square\Types;

enum InvoiceRequestType: string
{
    case Balance = "BALANCE";
    case Deposit = "DEPOSIT";
    case Installment = "INSTALLMENT";
}
