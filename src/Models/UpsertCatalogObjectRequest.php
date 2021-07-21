<?php

declare(strict_types=1);

namespace Square\Models;

class UpsertCatalogObjectRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var CatalogObject
     */
    private $object;

    /**
     * @param string $idempotencyKey
     * @param CatalogObject $object
     */
    public function __construct(string $idempotencyKey, CatalogObject $object)
    {
        $this->idempotencyKey = $idempotencyKey;
        $this->object = $object;
    }

    /**
     * Returns Idempotency Key.
     *
     * A value you specify that uniquely identifies this
     * request among all your requests. A common way to create
     * a valid idempotency key is to use a Universally unique
     * identifier (UUID).
     *
     * If you're unsure whether a particular request was successful,
     * you can reattempt it with the same idempotency key without
     * worrying about creating duplicate objects.
     *
     * See [Idempotency](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A value you specify that uniquely identifies this
     * request among all your requests. A common way to create
     * a valid idempotency key is to use a Universally unique
     * identifier (UUID).
     *
     * If you're unsure whether a particular request was successful,
     * you can reattempt it with the same idempotency key without
     * worrying about creating duplicate objects.
     *
     * See [Idempotency](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey(string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Object.
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
    public function getObject(): CatalogObject
    {
        return $this->object;
    }

    /**
     * Sets Object.
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
     * @required
     * @maps object
     */
    public function setObject(CatalogObject $object): void
    {
        $this->object = $object;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['idempotency_key'] = $this->idempotencyKey;
        $json['object']          = $this->object;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
