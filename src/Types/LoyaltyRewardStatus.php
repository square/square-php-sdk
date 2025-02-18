<?php

namespace Square\Types;

enum LoyaltyRewardStatus: string
{
    case Issued = "ISSUED";
    case Redeemed = "REDEEMED";
    case Deleted = "DELETED";
}
