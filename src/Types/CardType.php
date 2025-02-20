<?php

namespace Square\Types;

enum CardType: string
{
    case UnknownCardType = "UNKNOWN_CARD_TYPE";
    case Credit = "CREDIT";
    case Debit = "DEBIT";
}
