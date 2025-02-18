<?php

namespace Square\Types;

enum V1TenderCardBrand: string
{
    case OtherBrand = "OTHER_BRAND";
    case Visa = "VISA";
    case MasterCard = "MASTER_CARD";
    case AmericanExpress = "AMERICAN_EXPRESS";
    case Discover = "DISCOVER";
    case DiscoverDiners = "DISCOVER_DINERS";
    case Jcb = "JCB";
    case ChinaUnionpay = "CHINA_UNIONPAY";
    case SquareGiftCard = "SQUARE_GIFT_CARD";
}
