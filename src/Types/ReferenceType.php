<?php

namespace Square\Types;

enum ReferenceType: string
{
    case UnknownType = "UNKNOWN_TYPE";
    case Location = "LOCATION";
    case FirstPartyIntegration = "FIRST_PARTY_INTEGRATION";
    case OauthApplication = "OAUTH_APPLICATION";
    case OnlineSite = "ONLINE_SITE";
    case OnlineCheckout = "ONLINE_CHECKOUT";
    case Invoice = "INVOICE";
    case GiftCard = "GIFT_CARD";
    case GiftCardMarketplace = "GIFT_CARD_MARKETPLACE";
    case RecurringSubscription = "RECURRING_SUBSCRIPTION";
    case OnlineBookingFlow = "ONLINE_BOOKING_FLOW";
    case SquareAssistant = "SQUARE_ASSISTANT";
    case CashLocal = "CASH_LOCAL";
    case PointOfSale = "POINT_OF_SALE";
    case Kiosk = "KIOSK";
}
