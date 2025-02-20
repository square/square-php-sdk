<?php

namespace Square\Types;

enum LoyaltyPromotionStatus: string
{
    case Active = "ACTIVE";
    case Ended = "ENDED";
    case Canceled = "CANCELED";
    case Scheduled = "SCHEDULED";
}
