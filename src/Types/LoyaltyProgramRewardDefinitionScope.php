<?php

namespace Square\Types;

enum LoyaltyProgramRewardDefinitionScope: string
{
    case Order = "ORDER";
    case ItemVariation = "ITEM_VARIATION";
    case Category = "CATEGORY";
}
