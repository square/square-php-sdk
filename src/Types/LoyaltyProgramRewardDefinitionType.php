<?php

namespace Square\Types;

enum LoyaltyProgramRewardDefinitionType: string
{
    case FixedAmount = "FIXED_AMOUNT";
    case FixedPercentage = "FIXED_PERCENTAGE";
}
