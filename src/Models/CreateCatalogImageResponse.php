<?php

declare(strict_types=1);

namespace Square\Models;

class CreateCatalogImageResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var CatalogObject|null
     */
    private $image;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Image.
     *
     * The wrapper object for the Catalog entries of a given object type.
     *
     * The type of a particular `CatalogObject` is determined by the value of the
     * `type` attribute and only the corresponding data attribute can be set on the `CatalogObject`
     * instance.
     * For example, the following list shows some instances of `CatalogObject` of a given `type` and
     * their corresponding data attribute that can be set:
     * - For a `CatalogObject` of the `ITEM` type, set the `item_data` attribute to yield the `CatalogItem`
     * object.
     * - For a `CatalogObject` of the `ITEM_VARIATION` type, set the `item_variation_data` attribute to
     * yield the `CatalogItemVariation` object.
     * - For a `CatalogObject` of the `MODIFIER` type, set the `modifier_data` attribute to yield the
     * `CatalogModifier` object.
     * - For a `CatalogObject` of the `MODIFIER_LIST` type, set the `modifier_list_data` attribute to yield
     * the `CatalogModifierList` object.
     * - For a `CatalogObject` of the `CATEGORY` type, set the `category_data` attribute to yield the
     * `CatalogCategory` object.
     * - For a `CatalogObject` of the `DISCOUNT` type, set the `discount_data` attribute to yield the
     * `CatalogDiscount` object.
     * - For a `CatalogObject` of the `TAX` type, set the `tax_data` attribute to yield the `CatalogTax`
     * object.
     * - For a `CatalogObject` of the `IMAGE` type, set the `image_data` attribute to yield the
     * `CatalogImageData`  object.
     * - For a `CatalogObject` of the `QUICK_AMOUNTS_SETTINGS` type, set the `quick_amounts_settings_data`
     * attribute to yield the `CatalogQuickAmountsSettings` object.
     * - For a `CatalogObject` of the `PRICING_RULE` type, set the `pricing_rule_data` attribute to yield
     * the `CatalogPricingRule` object.
     * - For a `CatalogObject` of the `TIME_PERIOD` type, set the `time_period_data` attribute to yield the
     * `CatalogTimePeriod` object.
     * - For a `CatalogObject` of the `PRODUCT_SET` type, set the `product_set_data` attribute to yield the
     * `CatalogProductSet`  object.
     * - For a `CatalogObject` of the `SUBSCRIPTION_PLAN` type, set the `subscription_plan_data` attribute
     * to yield the `CatalogSubscriptionPlan` object.
     *
     *
     * For a more detailed discussion of the Catalog data model, please see the
     * [Design a Catalog](https://developer.squareup.com/docs/catalog-api/design-a-catalog) guide.
     */
    public function getImage(): ?CatalogObject
    {
        return $this->image;
    }

    /**
     * Sets Image.
     *
     * The wrapper object for the Catalog entries of a given object type.
     *
     * The type of a particular `CatalogObject` is determined by the value of the
     * `type` attribute and only the corresponding data attribute can be set on the `CatalogObject`
     * instance.
     * For example, the following list shows some instances of `CatalogObject` of a given `type` and
     * their corresponding data attribute that can be set:
     * - For a `CatalogObject` of the `ITEM` type, set the `item_data` attribute to yield the `CatalogItem`
     * object.
     * - For a `CatalogObject` of the `ITEM_VARIATION` type, set the `item_variation_data` attribute to
     * yield the `CatalogItemVariation` object.
     * - For a `CatalogObject` of the `MODIFIER` type, set the `modifier_data` attribute to yield the
     * `CatalogModifier` object.
     * - For a `CatalogObject` of the `MODIFIER_LIST` type, set the `modifier_list_data` attribute to yield
     * the `CatalogModifierList` object.
     * - For a `CatalogObject` of the `CATEGORY` type, set the `category_data` attribute to yield the
     * `CatalogCategory` object.
     * - For a `CatalogObject` of the `DISCOUNT` type, set the `discount_data` attribute to yield the
     * `CatalogDiscount` object.
     * - For a `CatalogObject` of the `TAX` type, set the `tax_data` attribute to yield the `CatalogTax`
     * object.
     * - For a `CatalogObject` of the `IMAGE` type, set the `image_data` attribute to yield the
     * `CatalogImageData`  object.
     * - For a `CatalogObject` of the `QUICK_AMOUNTS_SETTINGS` type, set the `quick_amounts_settings_data`
     * attribute to yield the `CatalogQuickAmountsSettings` object.
     * - For a `CatalogObject` of the `PRICING_RULE` type, set the `pricing_rule_data` attribute to yield
     * the `CatalogPricingRule` object.
     * - For a `CatalogObject` of the `TIME_PERIOD` type, set the `time_period_data` attribute to yield the
     * `CatalogTimePeriod` object.
     * - For a `CatalogObject` of the `PRODUCT_SET` type, set the `product_set_data` attribute to yield the
     * `CatalogProductSet`  object.
     * - For a `CatalogObject` of the `SUBSCRIPTION_PLAN` type, set the `subscription_plan_data` attribute
     * to yield the `CatalogSubscriptionPlan` object.
     *
     *
     * For a more detailed discussion of the Catalog data model, please see the
     * [Design a Catalog](https://developer.squareup.com/docs/catalog-api/design-a-catalog) guide.
     *
     * @maps image
     */
    public function setImage(?CatalogObject $image): void
    {
        $this->image = $image;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors'] = $this->errors;
        }
        if (isset($this->image)) {
            $json['image']  = $this->image;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
