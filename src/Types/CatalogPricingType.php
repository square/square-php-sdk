<?php

namespace Square\Types;

enum CatalogPricingType: string
{
    case FixedPricing = "FIXED_PRICING";
    case VariablePricing = "VARIABLE_PRICING";
}
