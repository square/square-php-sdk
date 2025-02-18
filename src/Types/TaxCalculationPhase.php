<?php

namespace Square\Types;

enum TaxCalculationPhase: string
{
    case TaxSubtotalPhase = "TAX_SUBTOTAL_PHASE";
    case TaxTotalPhase = "TAX_TOTAL_PHASE";
}
