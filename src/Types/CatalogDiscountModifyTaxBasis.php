<?php

namespace Square\Types;

enum CatalogDiscountModifyTaxBasis: string
{
    case ModifyTaxBasis = "MODIFY_TAX_BASIS";
    case DoNotModifyTaxBasis = "DO_NOT_MODIFY_TAX_BASIS";
}
