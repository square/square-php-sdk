<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Possible types of CatalogObjects returned from the Catalog, each
 * containing type-specific properties in the `*_data` field corresponding to the object type.
 */
class CatalogObjectType
{
    /**
     * An item, corresponding to `CatalogItem`. The item-specific data
     * will be stored in the `item_data` field.
     */
    public const ITEM = 'ITEM';

    /**
     * An image, corresponding to `CatalogImage`. The image-specific data
     * will be stored in the `image_data` field.
     */
    public const IMAGE = 'IMAGE';

    /**
     * A category, corresponding to `CatalogCategory`. The category-specific data
     * will be stored in the `category_data` field.
     */
    public const CATEGORY = 'CATEGORY';

    /**
     * An item variation, corresponding to `CatalogItemVariation`. The
     * item variation-specific data will be stored in the `item_variation_data` field.
     */
    public const ITEM_VARIATION = 'ITEM_VARIATION';

    /**
     * A tax, corresponding to `CatalogTax`. The tax-specific data
     * will be stored in the `tax_data` field.
     */
    public const TAX = 'TAX';

    /**
     * A discount, corresponding to `CatalogDiscount`. The discount-specific data
     * will be stored in the `discount_data` field.
     */
    public const DISCOUNT = 'DISCOUNT';

    /**
     * A modifier list, corresponding to `CatalogModifierList`.
     * The modifier list-specific data will be stored in the `modifier_list_data` field.
     */
    public const MODIFIER_LIST = 'MODIFIER_LIST';

    /**
     * A modifier, corresponding to `CatalogModifier`. The modifier-specific data
     * will be stored in the `modifier_data` field.
     */
    public const MODIFIER = 'MODIFIER';

    /**
     * A pricing rule, corresponding to `CatalogPricingRule`. The pricing-rule-specific data
     * will be stored in the `pricing_rule_data` field.
     */
    public const PRICING_RULE = 'PRICING_RULE';

    /**
     * A product set, corresponding to `CatalogProductSet`.
     * The product-set-specific data will be stored in the `product_set_data` field.
     */
    public const PRODUCT_SET = 'PRODUCT_SET';

    /**
     * A time period, corresponding to `CatalogTimePeriod`.
     * The time-period-specific data will be stored in the `time_period_data` field.
     */
    public const TIME_PERIOD = 'TIME_PERIOD';

    /**
     * A measurement unit, corresponding to `CatalogMeasurementUnit`. The unit of
     * measure and precision in which an item variation should be sold.
     */
    public const MEASUREMENT_UNIT = 'MEASUREMENT_UNIT';

    /**
     * A subscription plan, corresponding to
     * [CatalogSubscriptionPlan]($m/CatalogSubscriptionPlan).
     *
     * The subscription plan data is stored in the `subscription_plan_data` field of the
     * [CatalogObject]($m/CatalogObject).
     */
    public const SUBSCRIPTION_PLAN = 'SUBSCRIPTION_PLAN';

    /**
     * Represents a list of item option values that can be assigned to item
     * variations. For example, a color option or size option for a t-shirt.
     */
    public const ITEM_OPTION = 'ITEM_OPTION';

    /**
     * Represents an option value associated with one or more item options.
     * For example, an item option of "Size" may have item option values such as
     * "Small" or "Medium".
     */
    public const ITEM_OPTION_VAL = 'ITEM_OPTION_VAL';

    /**
     * Represents the definition of a custom attribute
     */
    public const CUSTOM_ATTRIBUTE_DEFINITION = 'CUSTOM_ATTRIBUTE_DEFINITION';

    /**
     * Represents a set of Quick Amounts and their settings at each location.
     * For example, a location may have a list of both AUTO and MANUAL quick amounts that are set to
     * DISABLED.
     */
    public const QUICK_AMOUNTS_SETTINGS = 'QUICK_AMOUNTS_SETTINGS';
}
