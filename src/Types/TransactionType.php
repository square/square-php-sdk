<?php

namespace Square\Types;

enum TransactionType: string
{
    case Debit = "DEBIT";
    case Credit = "CREDIT";
}
