<?php

namespace Square\Types;

enum GiftCardActivityRedeemStatus: string
{
    case Pending = "PENDING";
    case Completed = "COMPLETED";
    case Canceled = "CANCELED";
}
