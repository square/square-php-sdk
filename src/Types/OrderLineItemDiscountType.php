<?php

namespace Square\Types;

enum OrderLineItemDiscountType: string
{
    case UnknownDiscount = "UNKNOWN_DISCOUNT";
    case FixedPercentage = "FIXED_PERCENTAGE";
    case FixedAmount = "FIXED_AMOUNT";
    case VariablePercentage = "VARIABLE_PERCENTAGE";
    case VariableAmount = "VARIABLE_AMOUNT";
}
