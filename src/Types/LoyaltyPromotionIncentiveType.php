<?php

namespace Square\Types;

enum LoyaltyPromotionIncentiveType: string
{
    case PointsMultiplier = "POINTS_MULTIPLIER";
    case PointsAddition = "POINTS_ADDITION";
}
