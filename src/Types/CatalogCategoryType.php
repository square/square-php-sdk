<?php

namespace Square\Types;

enum CatalogCategoryType: string
{
    case RegularCategory = "REGULAR_CATEGORY";
    case MenuCategory = "MENU_CATEGORY";
    case KitchenCategory = "KITCHEN_CATEGORY";
}
