<?php

namespace Square\Types;

enum TenderType: string
{
    case Card = "CARD";
    case Cash = "CASH";
    case ThirdPartyCard = "THIRD_PARTY_CARD";
    case SquareGiftCard = "SQUARE_GIFT_CARD";
    case NoSale = "NO_SALE";
    case BankAccount = "BANK_ACCOUNT";
    case Wallet = "WALLET";
    case BuyNowPayLater = "BUY_NOW_PAY_LATER";
    case SquareAccount = "SQUARE_ACCOUNT";
    case Other = "OTHER";
}
