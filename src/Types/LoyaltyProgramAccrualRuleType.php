<?php

namespace Square\Types;

enum LoyaltyProgramAccrualRuleType: string
{
    case Visit = "VISIT";
    case Spend = "SPEND";
    case ItemVariation = "ITEM_VARIATION";
    case Category = "CATEGORY";
}
