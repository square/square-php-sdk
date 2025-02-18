<?php

namespace Square\Types;

enum CatalogItemFoodAndBeverageDetailsDietaryPreferenceStandardDietaryPreference: string
{
    case DairyFree = "DAIRY_FREE";
    case GlutenFree = "GLUTEN_FREE";
    case Halal = "HALAL";
    case Kosher = "KOSHER";
    case NutFree = "NUT_FREE";
    case Vegan = "VEGAN";
    case Vegetarian = "VEGETARIAN";
}
