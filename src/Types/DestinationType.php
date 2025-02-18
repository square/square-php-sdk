<?php

namespace Square\Types;

enum DestinationType: string
{
    case BankAccount = "BANK_ACCOUNT";
    case Card = "CARD";
    case SquareBalance = "SQUARE_BALANCE";
    case SquareStoredBalance = "SQUARE_STORED_BALANCE";
}
