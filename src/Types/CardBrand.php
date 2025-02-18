<?php

namespace Square\Types;

enum CardBrand: string
{
    case OtherBrand = "OTHER_BRAND";
    case Visa = "VISA";
    case Mastercard = "MASTERCARD";
    case AmericanExpress = "AMERICAN_EXPRESS";
    case Discover = "DISCOVER";
    case DiscoverDiners = "DISCOVER_DINERS";
    case Jcb = "JCB";
    case ChinaUnionpay = "CHINA_UNIONPAY";
    case SquareGiftCard = "SQUARE_GIFT_CARD";
    case SquareCapitalCard = "SQUARE_CAPITAL_CARD";
    case Interac = "INTERAC";
    case Eftpos = "EFTPOS";
    case Felica = "FELICA";
    case Ebt = "EBT";
}
