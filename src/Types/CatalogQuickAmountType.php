<?php

namespace Square\Types;

enum CatalogQuickAmountType: string
{
    case QuickAmountTypeManual = "QUICK_AMOUNT_TYPE_MANUAL";
    case QuickAmountTypeAuto = "QUICK_AMOUNT_TYPE_AUTO";
}
