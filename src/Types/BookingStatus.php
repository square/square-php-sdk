<?php

namespace Square\Types;

enum BookingStatus: string
{
    case Pending = "PENDING";
    case CancelledByCustomer = "CANCELLED_BY_CUSTOMER";
    case CancelledBySeller = "CANCELLED_BY_SELLER";
    case Declined = "DECLINED";
    case Accepted = "ACCEPTED";
    case NoShow = "NO_SHOW";
}
