<?php

namespace Square\Types;

enum CatalogDiscountType: string
{
    case FixedPercentage = "FIXED_PERCENTAGE";
    case FixedAmount = "FIXED_AMOUNT";
    case VariablePercentage = "VARIABLE_PERCENTAGE";
    case VariableAmount = "VARIABLE_AMOUNT";
}
