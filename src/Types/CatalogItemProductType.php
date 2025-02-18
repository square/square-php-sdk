<?php

namespace Square\Types;

enum CatalogItemProductType: string
{
    case Regular = "REGULAR";
    case GiftCard = "GIFT_CARD";
    case AppointmentsService = "APPOINTMENTS_SERVICE";
    case FoodAndBev = "FOOD_AND_BEV";
    case Event = "EVENT";
    case Digital = "DIGITAL";
    case Donation = "DONATION";
    case LegacySquareOnlineService = "LEGACY_SQUARE_ONLINE_SERVICE";
    case LegacySquareOnlineMembership = "LEGACY_SQUARE_ONLINE_MEMBERSHIP";
}
