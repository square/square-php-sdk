<?php

namespace Square\Types;

enum CatalogObjectType: string
{
    case Item = "ITEM";
    case Image = "IMAGE";
    case Category = "CATEGORY";
    case ItemVariation = "ITEM_VARIATION";
    case Tax = "TAX";
    case Discount = "DISCOUNT";
    case ModifierList = "MODIFIER_LIST";
    case Modifier = "MODIFIER";
    case PricingRule = "PRICING_RULE";
    case ProductSet = "PRODUCT_SET";
    case TimePeriod = "TIME_PERIOD";
    case MeasurementUnit = "MEASUREMENT_UNIT";
    case SubscriptionPlanVariation = "SUBSCRIPTION_PLAN_VARIATION";
    case ItemOption = "ITEM_OPTION";
    case ItemOptionVal = "ITEM_OPTION_VAL";
    case CustomAttributeDefinition = "CUSTOM_ATTRIBUTE_DEFINITION";
    case QuickAmountsSettings = "QUICK_AMOUNTS_SETTINGS";
    case SubscriptionPlan = "SUBSCRIPTION_PLAN";
    case AvailabilityPeriod = "AVAILABILITY_PERIOD";
}
