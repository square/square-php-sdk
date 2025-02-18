<?php

namespace Square\Types;

enum V1TenderType: string
{
    case CreditCard = "CREDIT_CARD";
    case Cash = "CASH";
    case ThirdPartyCard = "THIRD_PARTY_CARD";
    case NoSale = "NO_SALE";
    case SquareWallet = "SQUARE_WALLET";
    case SquareGiftCard = "SQUARE_GIFT_CARD";
    case Unknown = "UNKNOWN";
    case Other = "OTHER";
}
