<?php

namespace Square\Types;

enum BankAccountType: string
{
    case Checking = "CHECKING";
    case Savings = "SAVINGS";
    case Investment = "INVESTMENT";
    case Other = "OTHER";
    case BusinessChecking = "BUSINESS_CHECKING";
}
