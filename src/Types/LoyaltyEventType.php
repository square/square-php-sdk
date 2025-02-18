<?php

namespace Square\Types;

enum LoyaltyEventType: string
{
    case AccumulatePoints = "ACCUMULATE_POINTS";
    case CreateReward = "CREATE_REWARD";
    case RedeemReward = "REDEEM_REWARD";
    case DeleteReward = "DELETE_REWARD";
    case AdjustPoints = "ADJUST_POINTS";
    case ExpirePoints = "EXPIRE_POINTS";
    case Other = "OTHER";
    case AccumulatePromotionPoints = "ACCUMULATE_PROMOTION_POINTS";
}
