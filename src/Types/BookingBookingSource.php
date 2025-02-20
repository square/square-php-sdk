<?php

namespace Square\Types;

enum BookingBookingSource: string
{
    case FirstPartyMerchant = "FIRST_PARTY_MERCHANT";
    case FirstPartyBuyer = "FIRST_PARTY_BUYER";
    case ThirdPartyBuyer = "THIRD_PARTY_BUYER";
    case Api = "API";
}
