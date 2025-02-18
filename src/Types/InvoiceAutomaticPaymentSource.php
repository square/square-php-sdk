<?php

namespace Square\Types;

enum InvoiceAutomaticPaymentSource: string
{
    case None = "NONE";
    case CardOnFile = "CARD_ON_FILE";
    case BankOnFile = "BANK_ON_FILE";
}
