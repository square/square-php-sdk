<?php

namespace Square\Types;

enum ActionCancelReason: string
{
    case BuyerCanceled = "BUYER_CANCELED";
    case SellerCanceled = "SELLER_CANCELED";
    case TimedOut = "TIMED_OUT";
}
