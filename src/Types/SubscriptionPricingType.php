<?php

namespace Square\Types;

enum SubscriptionPricingType: string
{
    case Static_ = "STATIC";
    case Relative = "RELATIVE";
}
