<?php

namespace Square\Types;

enum CatalogCustomAttributeDefinitionSellerVisibility: string
{
    case SellerVisibilityHidden = "SELLER_VISIBILITY_HIDDEN";
    case SellerVisibilityReadWriteValues = "SELLER_VISIBILITY_READ_WRITE_VALUES";
}
