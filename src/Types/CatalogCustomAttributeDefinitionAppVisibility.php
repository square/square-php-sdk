<?php

namespace Square\Types;

enum CatalogCustomAttributeDefinitionAppVisibility: string
{
    case AppVisibilityHidden = "APP_VISIBILITY_HIDDEN";
    case AppVisibilityReadOnly = "APP_VISIBILITY_READ_ONLY";
    case AppVisibilityReadWriteValues = "APP_VISIBILITY_READ_WRITE_VALUES";
}
