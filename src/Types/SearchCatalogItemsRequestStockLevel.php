<?php

namespace Square\Types;

enum SearchCatalogItemsRequestStockLevel: string
{
    case Out = "OUT";
    case Low = "LOW";
}
