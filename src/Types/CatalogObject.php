<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Exception;
use Square\Core\Json\JsonDecoder;

/**
 * The wrapper object for the catalog entries of a given object type.
 *
 * Depending on the `type` attribute value, a `CatalogObject` instance assumes a type-specific data to yield the corresponding type of catalog object.
 *
 * For example, if `type=ITEM`, the `CatalogObject` instance must have the ITEM-specific data set on the `item_data` attribute. The resulting `CatalogObject` instance is also a `CatalogItem` instance.
 *
 * In general, if `type=<OBJECT_TYPE>`, the `CatalogObject` instance must have the `<OBJECT_TYPE>`-specific data set on the `<object_type>_data` attribute. The resulting `CatalogObject` instance is also a `Catalog<ObjectType>` instance.
 *
 * For a more detailed discussion of the Catalog data model, please see the
 * [Design a Catalog](https://developer.squareup.com/docs/catalog-api/design-a-catalog) guide.
 */
class CatalogObject extends JsonSerializableType
{
    /**
     * @var (
     *    'ITEM'
     *   |'IMAGE'
     *   |'CATEGORY'
     *   |'ITEM_VARIATION'
     *   |'TAX'
     *   |'DISCOUNT'
     *   |'MODIFIER_LIST'
     *   |'MODIFIER'
     *   |'DINING_OPTION'
     *   |'TAX_EXEMPTION'
     *   |'SERVICE_CHARGE'
     *   |'PRICING_RULE'
     *   |'PRODUCT_SET'
     *   |'TIME_PERIOD'
     *   |'MEASUREMENT_UNIT'
     *   |'SUBSCRIPTION_PLAN'
     *   |'ITEM_OPTION'
     *   |'ITEM_OPTION_VAL'
     *   |'CUSTOM_ATTRIBUTE_DEFINITION'
     *   |'QUICK_AMOUNTS_SETTINGS'
     *   |'COMPONENT'
     *   |'COMPOSITION'
     *   |'RESOURCE'
     *   |'CHECKOUT_LINK'
     *   |'ADDRESS'
     *   |'SUBSCRIPTION_PRODUCT'
     *   |'_unknown'
     * ) $type
     */
    private readonly string $type;

    /**
     * @var (
     *    CatalogObjectItem
     *   |CatalogObjectImage
     *   |CatalogObjectCategory
     *   |CatalogObjectItemVariation
     *   |CatalogObjectTax
     *   |CatalogObjectDiscount
     *   |CatalogObjectModifierList
     *   |CatalogObjectModifier
     *   |CatalogObjectDiningOption
     *   |CatalogObjectTaxExemption
     *   |CatalogObjectServiceCharge
     *   |CatalogObjectPricingRule
     *   |CatalogObjectProductSet
     *   |CatalogObjectTimePeriod
     *   |CatalogObjectMeasurementUnit
     *   |CatalogObjectSubscriptionPlan
     *   |CatalogObjectItemOption
     *   |CatalogObjectItemOptionValue
     *   |CatalogObjectCustomAttributeDefinition
     *   |CatalogObjectQuickAmountsSettings
     *   |CatalogObjectComponent
     *   |CatalogObjectComposition
     *   |CatalogObjectResource
     *   |CatalogObjectCheckoutLink
     *   |CatalogObjectAddress
     *   |CatalogObjectSubscriptionProduct
     *   |mixed
     * ) $value
     */
    private readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'ITEM'
     *   |'IMAGE'
     *   |'CATEGORY'
     *   |'ITEM_VARIATION'
     *   |'TAX'
     *   |'DISCOUNT'
     *   |'MODIFIER_LIST'
     *   |'MODIFIER'
     *   |'DINING_OPTION'
     *   |'TAX_EXEMPTION'
     *   |'SERVICE_CHARGE'
     *   |'PRICING_RULE'
     *   |'PRODUCT_SET'
     *   |'TIME_PERIOD'
     *   |'MEASUREMENT_UNIT'
     *   |'SUBSCRIPTION_PLAN'
     *   |'ITEM_OPTION'
     *   |'ITEM_OPTION_VAL'
     *   |'CUSTOM_ATTRIBUTE_DEFINITION'
     *   |'QUICK_AMOUNTS_SETTINGS'
     *   |'COMPONENT'
     *   |'COMPOSITION'
     *   |'RESOURCE'
     *   |'CHECKOUT_LINK'
     *   |'ADDRESS'
     *   |'SUBSCRIPTION_PRODUCT'
     *   |'_unknown'
     * ),
     *   value: (
     *    CatalogObjectItem
     *   |CatalogObjectImage
     *   |CatalogObjectCategory
     *   |CatalogObjectItemVariation
     *   |CatalogObjectTax
     *   |CatalogObjectDiscount
     *   |CatalogObjectModifierList
     *   |CatalogObjectModifier
     *   |CatalogObjectDiningOption
     *   |CatalogObjectTaxExemption
     *   |CatalogObjectServiceCharge
     *   |CatalogObjectPricingRule
     *   |CatalogObjectProductSet
     *   |CatalogObjectTimePeriod
     *   |CatalogObjectMeasurementUnit
     *   |CatalogObjectSubscriptionPlan
     *   |CatalogObjectItemOption
     *   |CatalogObjectItemOptionValue
     *   |CatalogObjectCustomAttributeDefinition
     *   |CatalogObjectQuickAmountsSettings
     *   |CatalogObjectComponent
     *   |CatalogObjectComposition
     *   |CatalogObjectResource
     *   |CatalogObjectCheckoutLink
     *   |CatalogObjectAddress
     *   |CatalogObjectSubscriptionProduct
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->value = $values['value'];
    }

    /**
     * @return (
     *    'ITEM'
     *   |'IMAGE'
     *   |'CATEGORY'
     *   |'ITEM_VARIATION'
     *   |'TAX'
     *   |'DISCOUNT'
     *   |'MODIFIER_LIST'
     *   |'MODIFIER'
     *   |'DINING_OPTION'
     *   |'TAX_EXEMPTION'
     *   |'SERVICE_CHARGE'
     *   |'PRICING_RULE'
     *   |'PRODUCT_SET'
     *   |'TIME_PERIOD'
     *   |'MEASUREMENT_UNIT'
     *   |'SUBSCRIPTION_PLAN'
     *   |'ITEM_OPTION'
     *   |'ITEM_OPTION_VAL'
     *   |'CUSTOM_ATTRIBUTE_DEFINITION'
     *   |'QUICK_AMOUNTS_SETTINGS'
     *   |'COMPONENT'
     *   |'COMPOSITION'
     *   |'RESOURCE'
     *   |'CHECKOUT_LINK'
     *   |'ADDRESS'
     *   |'SUBSCRIPTION_PRODUCT'
     *   |'_unknown'
     * )
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return (
     *    CatalogObjectItem
     *   |CatalogObjectImage
     *   |CatalogObjectCategory
     *   |CatalogObjectItemVariation
     *   |CatalogObjectTax
     *   |CatalogObjectDiscount
     *   |CatalogObjectModifierList
     *   |CatalogObjectModifier
     *   |CatalogObjectDiningOption
     *   |CatalogObjectTaxExemption
     *   |CatalogObjectServiceCharge
     *   |CatalogObjectPricingRule
     *   |CatalogObjectProductSet
     *   |CatalogObjectTimePeriod
     *   |CatalogObjectMeasurementUnit
     *   |CatalogObjectSubscriptionPlan
     *   |CatalogObjectItemOption
     *   |CatalogObjectItemOptionValue
     *   |CatalogObjectCustomAttributeDefinition
     *   |CatalogObjectQuickAmountsSettings
     *   |CatalogObjectComponent
     *   |CatalogObjectComposition
     *   |CatalogObjectResource
     *   |CatalogObjectCheckoutLink
     *   |CatalogObjectAddress
     *   |CatalogObjectSubscriptionProduct
     *   |mixed
     * )
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @param CatalogObjectItem $item
     * @return CatalogObject
     */
    public static function item(CatalogObjectItem $item): CatalogObject
    {
        return new CatalogObject([
            'type' => 'ITEM',
            'value' => $item,
        ]);
    }

    /**
     * @param CatalogObjectImage $image
     * @return CatalogObject
     */
    public static function image(CatalogObjectImage $image): CatalogObject
    {
        return new CatalogObject([
            'type' => 'IMAGE',
            'value' => $image,
        ]);
    }

    /**
     * @param CatalogObjectCategory $category
     * @return CatalogObject
     */
    public static function category(CatalogObjectCategory $category): CatalogObject
    {
        return new CatalogObject([
            'type' => 'CATEGORY',
            'value' => $category,
        ]);
    }

    /**
     * @param CatalogObjectItemVariation $itemVariation
     * @return CatalogObject
     */
    public static function itemVariation(CatalogObjectItemVariation $itemVariation): CatalogObject
    {
        return new CatalogObject([
            'type' => 'ITEM_VARIATION',
            'value' => $itemVariation,
        ]);
    }

    /**
     * @param CatalogObjectTax $tax
     * @return CatalogObject
     */
    public static function tax(CatalogObjectTax $tax): CatalogObject
    {
        return new CatalogObject([
            'type' => 'TAX',
            'value' => $tax,
        ]);
    }

    /**
     * @param CatalogObjectDiscount $discount
     * @return CatalogObject
     */
    public static function discount(CatalogObjectDiscount $discount): CatalogObject
    {
        return new CatalogObject([
            'type' => 'DISCOUNT',
            'value' => $discount,
        ]);
    }

    /**
     * @param CatalogObjectModifierList $modifierList
     * @return CatalogObject
     */
    public static function modifierList(CatalogObjectModifierList $modifierList): CatalogObject
    {
        return new CatalogObject([
            'type' => 'MODIFIER_LIST',
            'value' => $modifierList,
        ]);
    }

    /**
     * @param CatalogObjectModifier $modifier
     * @return CatalogObject
     */
    public static function modifier(CatalogObjectModifier $modifier): CatalogObject
    {
        return new CatalogObject([
            'type' => 'MODIFIER',
            'value' => $modifier,
        ]);
    }

    /**
     * @param CatalogObjectDiningOption $diningOption
     * @return CatalogObject
     */
    public static function diningOption(CatalogObjectDiningOption $diningOption): CatalogObject
    {
        return new CatalogObject([
            'type' => 'DINING_OPTION',
            'value' => $diningOption,
        ]);
    }

    /**
     * @param CatalogObjectTaxExemption $taxExemption
     * @return CatalogObject
     */
    public static function taxExemption(CatalogObjectTaxExemption $taxExemption): CatalogObject
    {
        return new CatalogObject([
            'type' => 'TAX_EXEMPTION',
            'value' => $taxExemption,
        ]);
    }

    /**
     * @param CatalogObjectServiceCharge $serviceCharge
     * @return CatalogObject
     */
    public static function serviceCharge(CatalogObjectServiceCharge $serviceCharge): CatalogObject
    {
        return new CatalogObject([
            'type' => 'SERVICE_CHARGE',
            'value' => $serviceCharge,
        ]);
    }

    /**
     * @param CatalogObjectPricingRule $pricingRule
     * @return CatalogObject
     */
    public static function pricingRule(CatalogObjectPricingRule $pricingRule): CatalogObject
    {
        return new CatalogObject([
            'type' => 'PRICING_RULE',
            'value' => $pricingRule,
        ]);
    }

    /**
     * @param CatalogObjectProductSet $productSet
     * @return CatalogObject
     */
    public static function productSet(CatalogObjectProductSet $productSet): CatalogObject
    {
        return new CatalogObject([
            'type' => 'PRODUCT_SET',
            'value' => $productSet,
        ]);
    }

    /**
     * @param CatalogObjectTimePeriod $timePeriod
     * @return CatalogObject
     */
    public static function timePeriod(CatalogObjectTimePeriod $timePeriod): CatalogObject
    {
        return new CatalogObject([
            'type' => 'TIME_PERIOD',
            'value' => $timePeriod,
        ]);
    }

    /**
     * @param CatalogObjectMeasurementUnit $measurementUnit
     * @return CatalogObject
     */
    public static function measurementUnit(CatalogObjectMeasurementUnit $measurementUnit): CatalogObject
    {
        return new CatalogObject([
            'type' => 'MEASUREMENT_UNIT',
            'value' => $measurementUnit,
        ]);
    }

    /**
     * @param CatalogObjectSubscriptionPlan $subscriptionPlan
     * @return CatalogObject
     */
    public static function subscriptionPlan(CatalogObjectSubscriptionPlan $subscriptionPlan): CatalogObject
    {
        return new CatalogObject([
            'type' => 'SUBSCRIPTION_PLAN',
            'value' => $subscriptionPlan,
        ]);
    }

    /**
     * @param CatalogObjectItemOption $itemOption
     * @return CatalogObject
     */
    public static function itemOption(CatalogObjectItemOption $itemOption): CatalogObject
    {
        return new CatalogObject([
            'type' => 'ITEM_OPTION',
            'value' => $itemOption,
        ]);
    }

    /**
     * @param CatalogObjectItemOptionValue $itemOptionVal
     * @return CatalogObject
     */
    public static function itemOptionVal(CatalogObjectItemOptionValue $itemOptionVal): CatalogObject
    {
        return new CatalogObject([
            'type' => 'ITEM_OPTION_VAL',
            'value' => $itemOptionVal,
        ]);
    }

    /**
     * @param CatalogObjectCustomAttributeDefinition $customAttributeDefinition
     * @return CatalogObject
     */
    public static function customAttributeDefinition(CatalogObjectCustomAttributeDefinition $customAttributeDefinition): CatalogObject
    {
        return new CatalogObject([
            'type' => 'CUSTOM_ATTRIBUTE_DEFINITION',
            'value' => $customAttributeDefinition,
        ]);
    }

    /**
     * @param CatalogObjectQuickAmountsSettings $quickAmountsSettings
     * @return CatalogObject
     */
    public static function quickAmountsSettings(CatalogObjectQuickAmountsSettings $quickAmountsSettings): CatalogObject
    {
        return new CatalogObject([
            'type' => 'QUICK_AMOUNTS_SETTINGS',
            'value' => $quickAmountsSettings,
        ]);
    }

    /**
     * @param CatalogObjectComponent $component
     * @return CatalogObject
     */
    public static function component(CatalogObjectComponent $component): CatalogObject
    {
        return new CatalogObject([
            'type' => 'COMPONENT',
            'value' => $component,
        ]);
    }

    /**
     * @param CatalogObjectComposition $composition
     * @return CatalogObject
     */
    public static function composition(CatalogObjectComposition $composition): CatalogObject
    {
        return new CatalogObject([
            'type' => 'COMPOSITION',
            'value' => $composition,
        ]);
    }

    /**
     * @param CatalogObjectResource $resource
     * @return CatalogObject
     */
    public static function resource(CatalogObjectResource $resource): CatalogObject
    {
        return new CatalogObject([
            'type' => 'RESOURCE',
            'value' => $resource,
        ]);
    }

    /**
     * @param CatalogObjectCheckoutLink $checkoutLink
     * @return CatalogObject
     */
    public static function checkoutLink(CatalogObjectCheckoutLink $checkoutLink): CatalogObject
    {
        return new CatalogObject([
            'type' => 'CHECKOUT_LINK',
            'value' => $checkoutLink,
        ]);
    }

    /**
     * @param CatalogObjectAddress $address
     * @return CatalogObject
     */
    public static function address(CatalogObjectAddress $address): CatalogObject
    {
        return new CatalogObject([
            'type' => 'ADDRESS',
            'value' => $address,
        ]);
    }

    /**
     * @param CatalogObjectSubscriptionProduct $subscriptionProduct
     * @return CatalogObject
     */
    public static function subscriptionProduct(CatalogObjectSubscriptionProduct $subscriptionProduct): CatalogObject
    {
        return new CatalogObject([
            'type' => 'SUBSCRIPTION_PRODUCT',
            'value' => $subscriptionProduct,
        ]);
    }

    /**
     * @return bool
     */
    public function isItem(): bool
    {
        return $this->value instanceof CatalogObjectItem && $this->type === 'ITEM';
    }

    /**
     * @return CatalogObjectItem
     */
    public function asItem(): CatalogObjectItem
    {
        if (!($this->value instanceof CatalogObjectItem && $this->type === 'ITEM')) {
            throw new Exception(
                "Expected ITEM; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isImage(): bool
    {
        return $this->value instanceof CatalogObjectImage && $this->type === 'IMAGE';
    }

    /**
     * @return CatalogObjectImage
     */
    public function asImage(): CatalogObjectImage
    {
        if (!($this->value instanceof CatalogObjectImage && $this->type === 'IMAGE')) {
            throw new Exception(
                "Expected IMAGE; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCategory(): bool
    {
        return $this->value instanceof CatalogObjectCategory && $this->type === 'CATEGORY';
    }

    /**
     * @return CatalogObjectCategory
     */
    public function asCategory(): CatalogObjectCategory
    {
        if (!($this->value instanceof CatalogObjectCategory && $this->type === 'CATEGORY')) {
            throw new Exception(
                "Expected CATEGORY; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isItemVariation(): bool
    {
        return $this->value instanceof CatalogObjectItemVariation && $this->type === 'ITEM_VARIATION';
    }

    /**
     * @return CatalogObjectItemVariation
     */
    public function asItemVariation(): CatalogObjectItemVariation
    {
        if (!($this->value instanceof CatalogObjectItemVariation && $this->type === 'ITEM_VARIATION')) {
            throw new Exception(
                "Expected ITEM_VARIATION; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isTax(): bool
    {
        return $this->value instanceof CatalogObjectTax && $this->type === 'TAX';
    }

    /**
     * @return CatalogObjectTax
     */
    public function asTax(): CatalogObjectTax
    {
        if (!($this->value instanceof CatalogObjectTax && $this->type === 'TAX')) {
            throw new Exception(
                "Expected TAX; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isDiscount(): bool
    {
        return $this->value instanceof CatalogObjectDiscount && $this->type === 'DISCOUNT';
    }

    /**
     * @return CatalogObjectDiscount
     */
    public function asDiscount(): CatalogObjectDiscount
    {
        if (!($this->value instanceof CatalogObjectDiscount && $this->type === 'DISCOUNT')) {
            throw new Exception(
                "Expected DISCOUNT; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isModifierList(): bool
    {
        return $this->value instanceof CatalogObjectModifierList && $this->type === 'MODIFIER_LIST';
    }

    /**
     * @return CatalogObjectModifierList
     */
    public function asModifierList(): CatalogObjectModifierList
    {
        if (!($this->value instanceof CatalogObjectModifierList && $this->type === 'MODIFIER_LIST')) {
            throw new Exception(
                "Expected MODIFIER_LIST; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isModifier(): bool
    {
        return $this->value instanceof CatalogObjectModifier && $this->type === 'MODIFIER';
    }

    /**
     * @return CatalogObjectModifier
     */
    public function asModifier(): CatalogObjectModifier
    {
        if (!($this->value instanceof CatalogObjectModifier && $this->type === 'MODIFIER')) {
            throw new Exception(
                "Expected MODIFIER; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isDiningOption(): bool
    {
        return $this->value instanceof CatalogObjectDiningOption && $this->type === 'DINING_OPTION';
    }

    /**
     * @return CatalogObjectDiningOption
     */
    public function asDiningOption(): CatalogObjectDiningOption
    {
        if (!($this->value instanceof CatalogObjectDiningOption && $this->type === 'DINING_OPTION')) {
            throw new Exception(
                "Expected DINING_OPTION; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isTaxExemption(): bool
    {
        return $this->value instanceof CatalogObjectTaxExemption && $this->type === 'TAX_EXEMPTION';
    }

    /**
     * @return CatalogObjectTaxExemption
     */
    public function asTaxExemption(): CatalogObjectTaxExemption
    {
        if (!($this->value instanceof CatalogObjectTaxExemption && $this->type === 'TAX_EXEMPTION')) {
            throw new Exception(
                "Expected TAX_EXEMPTION; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isServiceCharge(): bool
    {
        return $this->value instanceof CatalogObjectServiceCharge && $this->type === 'SERVICE_CHARGE';
    }

    /**
     * @return CatalogObjectServiceCharge
     */
    public function asServiceCharge(): CatalogObjectServiceCharge
    {
        if (!($this->value instanceof CatalogObjectServiceCharge && $this->type === 'SERVICE_CHARGE')) {
            throw new Exception(
                "Expected SERVICE_CHARGE; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isPricingRule(): bool
    {
        return $this->value instanceof CatalogObjectPricingRule && $this->type === 'PRICING_RULE';
    }

    /**
     * @return CatalogObjectPricingRule
     */
    public function asPricingRule(): CatalogObjectPricingRule
    {
        if (!($this->value instanceof CatalogObjectPricingRule && $this->type === 'PRICING_RULE')) {
            throw new Exception(
                "Expected PRICING_RULE; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isProductSet(): bool
    {
        return $this->value instanceof CatalogObjectProductSet && $this->type === 'PRODUCT_SET';
    }

    /**
     * @return CatalogObjectProductSet
     */
    public function asProductSet(): CatalogObjectProductSet
    {
        if (!($this->value instanceof CatalogObjectProductSet && $this->type === 'PRODUCT_SET')) {
            throw new Exception(
                "Expected PRODUCT_SET; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isTimePeriod(): bool
    {
        return $this->value instanceof CatalogObjectTimePeriod && $this->type === 'TIME_PERIOD';
    }

    /**
     * @return CatalogObjectTimePeriod
     */
    public function asTimePeriod(): CatalogObjectTimePeriod
    {
        if (!($this->value instanceof CatalogObjectTimePeriod && $this->type === 'TIME_PERIOD')) {
            throw new Exception(
                "Expected TIME_PERIOD; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isMeasurementUnit(): bool
    {
        return $this->value instanceof CatalogObjectMeasurementUnit && $this->type === 'MEASUREMENT_UNIT';
    }

    /**
     * @return CatalogObjectMeasurementUnit
     */
    public function asMeasurementUnit(): CatalogObjectMeasurementUnit
    {
        if (!($this->value instanceof CatalogObjectMeasurementUnit && $this->type === 'MEASUREMENT_UNIT')) {
            throw new Exception(
                "Expected MEASUREMENT_UNIT; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSubscriptionPlan(): bool
    {
        return $this->value instanceof CatalogObjectSubscriptionPlan && $this->type === 'SUBSCRIPTION_PLAN';
    }

    /**
     * @return CatalogObjectSubscriptionPlan
     */
    public function asSubscriptionPlan(): CatalogObjectSubscriptionPlan
    {
        if (!($this->value instanceof CatalogObjectSubscriptionPlan && $this->type === 'SUBSCRIPTION_PLAN')) {
            throw new Exception(
                "Expected SUBSCRIPTION_PLAN; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isItemOption(): bool
    {
        return $this->value instanceof CatalogObjectItemOption && $this->type === 'ITEM_OPTION';
    }

    /**
     * @return CatalogObjectItemOption
     */
    public function asItemOption(): CatalogObjectItemOption
    {
        if (!($this->value instanceof CatalogObjectItemOption && $this->type === 'ITEM_OPTION')) {
            throw new Exception(
                "Expected ITEM_OPTION; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isItemOptionVal(): bool
    {
        return $this->value instanceof CatalogObjectItemOptionValue && $this->type === 'ITEM_OPTION_VAL';
    }

    /**
     * @return CatalogObjectItemOptionValue
     */
    public function asItemOptionVal(): CatalogObjectItemOptionValue
    {
        if (!($this->value instanceof CatalogObjectItemOptionValue && $this->type === 'ITEM_OPTION_VAL')) {
            throw new Exception(
                "Expected ITEM_OPTION_VAL; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCustomAttributeDefinition(): bool
    {
        return $this->value instanceof CatalogObjectCustomAttributeDefinition && $this->type === 'CUSTOM_ATTRIBUTE_DEFINITION';
    }

    /**
     * @return CatalogObjectCustomAttributeDefinition
     */
    public function asCustomAttributeDefinition(): CatalogObjectCustomAttributeDefinition
    {
        if (!($this->value instanceof CatalogObjectCustomAttributeDefinition && $this->type === 'CUSTOM_ATTRIBUTE_DEFINITION')) {
            throw new Exception(
                "Expected CUSTOM_ATTRIBUTE_DEFINITION; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isQuickAmountsSettings(): bool
    {
        return $this->value instanceof CatalogObjectQuickAmountsSettings && $this->type === 'QUICK_AMOUNTS_SETTINGS';
    }

    /**
     * @return CatalogObjectQuickAmountsSettings
     */
    public function asQuickAmountsSettings(): CatalogObjectQuickAmountsSettings
    {
        if (!($this->value instanceof CatalogObjectQuickAmountsSettings && $this->type === 'QUICK_AMOUNTS_SETTINGS')) {
            throw new Exception(
                "Expected QUICK_AMOUNTS_SETTINGS; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isComponent(): bool
    {
        return $this->value instanceof CatalogObjectComponent && $this->type === 'COMPONENT';
    }

    /**
     * @return CatalogObjectComponent
     */
    public function asComponent(): CatalogObjectComponent
    {
        if (!($this->value instanceof CatalogObjectComponent && $this->type === 'COMPONENT')) {
            throw new Exception(
                "Expected COMPONENT; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isComposition(): bool
    {
        return $this->value instanceof CatalogObjectComposition && $this->type === 'COMPOSITION';
    }

    /**
     * @return CatalogObjectComposition
     */
    public function asComposition(): CatalogObjectComposition
    {
        if (!($this->value instanceof CatalogObjectComposition && $this->type === 'COMPOSITION')) {
            throw new Exception(
                "Expected COMPOSITION; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isResource(): bool
    {
        return $this->value instanceof CatalogObjectResource && $this->type === 'RESOURCE';
    }

    /**
     * @return CatalogObjectResource
     */
    public function asResource(): CatalogObjectResource
    {
        if (!($this->value instanceof CatalogObjectResource && $this->type === 'RESOURCE')) {
            throw new Exception(
                "Expected RESOURCE; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCheckoutLink(): bool
    {
        return $this->value instanceof CatalogObjectCheckoutLink && $this->type === 'CHECKOUT_LINK';
    }

    /**
     * @return CatalogObjectCheckoutLink
     */
    public function asCheckoutLink(): CatalogObjectCheckoutLink
    {
        if (!($this->value instanceof CatalogObjectCheckoutLink && $this->type === 'CHECKOUT_LINK')) {
            throw new Exception(
                "Expected CHECKOUT_LINK; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isAddress(): bool
    {
        return $this->value instanceof CatalogObjectAddress && $this->type === 'ADDRESS';
    }

    /**
     * @return CatalogObjectAddress
     */
    public function asAddress(): CatalogObjectAddress
    {
        if (!($this->value instanceof CatalogObjectAddress && $this->type === 'ADDRESS')) {
            throw new Exception(
                "Expected ADDRESS; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSubscriptionProduct(): bool
    {
        return $this->value instanceof CatalogObjectSubscriptionProduct && $this->type === 'SUBSCRIPTION_PRODUCT';
    }

    /**
     * @return CatalogObjectSubscriptionProduct
     */
    public function asSubscriptionProduct(): CatalogObjectSubscriptionProduct
    {
        if (!($this->value instanceof CatalogObjectSubscriptionProduct && $this->type === 'SUBSCRIPTION_PRODUCT')) {
            throw new Exception(
                "Expected SUBSCRIPTION_PRODUCT; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        $result = [];
        $result['type'] = $this->type;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->type) {
            case 'ITEM':
                $value = $this->asItem()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'IMAGE':
                $value = $this->asImage()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'CATEGORY':
                $value = $this->asCategory()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'ITEM_VARIATION':
                $value = $this->asItemVariation()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'TAX':
                $value = $this->asTax()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'DISCOUNT':
                $value = $this->asDiscount()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'MODIFIER_LIST':
                $value = $this->asModifierList()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'MODIFIER':
                $value = $this->asModifier()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'DINING_OPTION':
                $value = $this->asDiningOption()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'TAX_EXEMPTION':
                $value = $this->asTaxExemption()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'SERVICE_CHARGE':
                $value = $this->asServiceCharge()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'PRICING_RULE':
                $value = $this->asPricingRule()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'PRODUCT_SET':
                $value = $this->asProductSet()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'TIME_PERIOD':
                $value = $this->asTimePeriod()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'MEASUREMENT_UNIT':
                $value = $this->asMeasurementUnit()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'SUBSCRIPTION_PLAN':
                $value = $this->asSubscriptionPlan()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'ITEM_OPTION':
                $value = $this->asItemOption()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'ITEM_OPTION_VAL':
                $value = $this->asItemOptionVal()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'CUSTOM_ATTRIBUTE_DEFINITION':
                $value = $this->asCustomAttributeDefinition()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'QUICK_AMOUNTS_SETTINGS':
                $value = $this->asQuickAmountsSettings()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'COMPONENT':
                $value = $this->asComponent()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'COMPOSITION':
                $value = $this->asComposition()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'RESOURCE':
                $value = $this->asResource()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'CHECKOUT_LINK':
                $value = $this->asCheckoutLink()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'ADDRESS':
                $value = $this->asAddress()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'SUBSCRIPTION_PRODUCT':
                $value = $this->asSubscriptionProduct()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case '_unknown':
            default:
                if (is_null($this->value)) {
                    break;
                }
                if ($this->value instanceof JsonSerializableType) {
                    $value = $this->value->jsonSerialize();
                    $result = array_merge($value, $result);
                } elseif (is_array($this->value)) {
                    $result = array_merge($this->value, $result);
                }
        }

        return $result;
    }

    /**
     * @param string $json
     */
    public static function fromJson(string $json): static
    {
        $decodedJson = JsonDecoder::decode($json);
        if (!is_array($decodedJson)) {
            throw new Exception("Unexpected non-array decoded type: " . gettype($decodedJson));
        }
        return self::jsonDeserialize($decodedJson);
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function jsonDeserialize(array $data): static
    {
        $args = [];
        if (!array_key_exists('type', $data)) {
            throw new Exception(
                "JSON data is missing property 'type'",
            );
        }
        $type = $data['type'];
        if (!(is_string($type))) {
            throw new Exception(
                "Expected property 'type' in JSON data to be string, instead received " . get_debug_type($data['type']),
            );
        }

        $args['type'] = $type;
        switch ($type) {
            case 'ITEM':
                $args['value'] = CatalogObjectItem::jsonDeserialize($data);
                break;
            case 'IMAGE':
                $args['value'] = CatalogObjectImage::jsonDeserialize($data);
                break;
            case 'CATEGORY':
                $args['value'] = CatalogObjectCategory::jsonDeserialize($data);
                break;
            case 'ITEM_VARIATION':
                $args['value'] = CatalogObjectItemVariation::jsonDeserialize($data);
                break;
            case 'TAX':
                $args['value'] = CatalogObjectTax::jsonDeserialize($data);
                break;
            case 'DISCOUNT':
                $args['value'] = CatalogObjectDiscount::jsonDeserialize($data);
                break;
            case 'MODIFIER_LIST':
                $args['value'] = CatalogObjectModifierList::jsonDeserialize($data);
                break;
            case 'MODIFIER':
                $args['value'] = CatalogObjectModifier::jsonDeserialize($data);
                break;
            case 'DINING_OPTION':
                $args['value'] = CatalogObjectDiningOption::jsonDeserialize($data);
                break;
            case 'TAX_EXEMPTION':
                $args['value'] = CatalogObjectTaxExemption::jsonDeserialize($data);
                break;
            case 'SERVICE_CHARGE':
                $args['value'] = CatalogObjectServiceCharge::jsonDeserialize($data);
                break;
            case 'PRICING_RULE':
                $args['value'] = CatalogObjectPricingRule::jsonDeserialize($data);
                break;
            case 'PRODUCT_SET':
                $args['value'] = CatalogObjectProductSet::jsonDeserialize($data);
                break;
            case 'TIME_PERIOD':
                $args['value'] = CatalogObjectTimePeriod::jsonDeserialize($data);
                break;
            case 'MEASUREMENT_UNIT':
                $args['value'] = CatalogObjectMeasurementUnit::jsonDeserialize($data);
                break;
            case 'SUBSCRIPTION_PLAN':
                $args['value'] = CatalogObjectSubscriptionPlan::jsonDeserialize($data);
                break;
            case 'ITEM_OPTION':
                $args['value'] = CatalogObjectItemOption::jsonDeserialize($data);
                break;
            case 'ITEM_OPTION_VAL':
                $args['value'] = CatalogObjectItemOptionValue::jsonDeserialize($data);
                break;
            case 'CUSTOM_ATTRIBUTE_DEFINITION':
                $args['value'] = CatalogObjectCustomAttributeDefinition::jsonDeserialize($data);
                break;
            case 'QUICK_AMOUNTS_SETTINGS':
                $args['value'] = CatalogObjectQuickAmountsSettings::jsonDeserialize($data);
                break;
            case 'COMPONENT':
                $args['value'] = CatalogObjectComponent::jsonDeserialize($data);
                break;
            case 'COMPOSITION':
                $args['value'] = CatalogObjectComposition::jsonDeserialize($data);
                break;
            case 'RESOURCE':
                $args['value'] = CatalogObjectResource::jsonDeserialize($data);
                break;
            case 'CHECKOUT_LINK':
                $args['value'] = CatalogObjectCheckoutLink::jsonDeserialize($data);
                break;
            case 'ADDRESS':
                $args['value'] = CatalogObjectAddress::jsonDeserialize($data);
                break;
            case 'SUBSCRIPTION_PRODUCT':
                $args['value'] = CatalogObjectSubscriptionProduct::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['type'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
