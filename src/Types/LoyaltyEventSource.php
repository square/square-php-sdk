<?php

namespace Square\Types;

enum LoyaltyEventSource: string
{
    case Square = "SQUARE";
    case LoyaltyApi = "LOYALTY_API";
}
