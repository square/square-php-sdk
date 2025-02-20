<?php

namespace Square\Types;

enum OrderServiceChargeCalculationPhase: string
{
    case SubtotalPhase = "SUBTOTAL_PHASE";
    case TotalPhase = "TOTAL_PHASE";
    case ApportionedPercentagePhase = "APPORTIONED_PERCENTAGE_PHASE";
    case ApportionedAmountPhase = "APPORTIONED_AMOUNT_PHASE";
}
