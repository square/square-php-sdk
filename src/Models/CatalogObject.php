<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The wrapper object for object types in the Catalog data model. The type
 * of a particular `CatalogObject` is determined by the value of
 * `type` and only the corresponding data field may be set.
 *
 * - if type = `ITEM`, only `item_data` will be populated and it will contain a valid `CatalogItem`
 * object.
 * - if type = `ITEM_VARIATION`, only `item_variation_data` will be populated and it will contain a
 * valid `CatalogItemVariation` object.
 * - if type = `MODIFIER`, only `modifier_data` will be populated and it will contain a valid
 * `CatalogModifier` object.
 * - if type = `MODIFIER_LIST`, only `modifier_list_data` will be populated and it will contain a valid
 * `CatalogModifierList` object.
 * - if type = `CATEGORY`, only `category_data` will be populated and it will contain a valid
 * `CatalogCategory` object.
 * - if type = `DISCOUNT`, only `discount_data` will be populated and it will contain a valid
 * `CatalogDiscount` object.
 * - if type = `TAX`, only `tax_data` will be populated and it will contain a valid `CatalogTax` object.
 * - if type = `IMAGE`, only `image_data` will be populated and it will contain a valid `CatalogImage`
 * object.
 * - if type = `QUICK_AMOUNTS_SETTINGS`, only `quick_amounts_settings_data` will be populated and will
 * contain a valid `CatalogQuickAmountsSettings` object.
 *
 * For a more detailed discussion of the Catalog data model, please see the
 * [Design a Catalog](https://developer.squareup.com/docs/catalog-api/design-a-catalog) guide.
 */
class CatalogObject implements \JsonSerializable
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var bool|null
     */
    private $isDeleted;

    /**
     * @var array|null
     */
    private $customAttributeValues;

    /**
     * @var CatalogV1Id[]|null
     */
    private $catalogV1Ids;

    /**
     * @var bool|null
     */
    private $presentAtAllLocations;

    /**
     * @var string[]|null
     */
    private $presentAtLocationIds;

    /**
     * @var string[]|null
     */
    private $absentAtLocationIds;

    /**
     * @var string|null
     */
    private $imageId;

    /**
     * @var CatalogItem|null
     */
    private $itemData;

    /**
     * @var CatalogCategory|null
     */
    private $categoryData;

    /**
     * @var CatalogItemVariation|null
     */
    private $itemVariationData;

    /**
     * @var CatalogTax|null
     */
    private $taxData;

    /**
     * @var CatalogDiscount|null
     */
    private $discountData;

    /**
     * @var CatalogModifierList|null
     */
    private $modifierListData;

    /**
     * @var CatalogModifier|null
     */
    private $modifierData;

    /**
     * @var CatalogTimePeriod|null
     */
    private $timePeriodData;

    /**
     * @var CatalogProductSet|null
     */
    private $productSetData;

    /**
     * @var CatalogPricingRule|null
     */
    private $pricingRuleData;

    /**
     * @var CatalogImage|null
     */
    private $imageData;

    /**
     * @var CatalogMeasurementUnit|null
     */
    private $measurementUnitData;

    /**
     * @var CatalogItemOption|null
     */
    private $itemOptionData;

    /**
     * @var CatalogItemOptionValue|null
     */
    private $itemOptionValueData;

    /**
     * @var CatalogCustomAttributeDefinition|null
     */
    private $customAttributeDefinitionData;

    /**
     * @var CatalogQuickAmountsSettings|null
     */
    private $quickAmountsSettingsData;

    /**
     * @param string $type
     * @param string $id
     */
    public function __construct(string $type, string $id)
    {
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * Returns Type.
     *
     * Possible types of CatalogObjects returned from the Catalog, each
     * containing type-specific properties in the `*_data` field corresponding to the object type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * Possible types of CatalogObjects returned from the Catalog, each
     * containing type-specific properties in the `*_data` field corresponding to the object type.
     *
     * @required
     * @maps type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Id.
     *
     * An identifier to reference this object in the catalog. When a new `CatalogObject`
     * is inserted, the client should set the id to a temporary identifier starting with
     * a "`#`" character. Other objects being inserted or updated within the same request
     * may use this identifier to refer to the new object.
     *
     * When the server receives the new object, it will supply a unique identifier that
     * replaces the temporary identifier for all future references.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * An identifier to reference this object in the catalog. When a new `CatalogObject`
     * is inserted, the client should set the id to a temporary identifier starting with
     * a "`#`" character. Other objects being inserted or updated within the same request
     * may use this identifier to refer to the new object.
     *
     * When the server receives the new object, it will supply a unique identifier that
     * replaces the temporary identifier for all future references.
     *
     * @required
     * @maps id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Updated At.
     *
     * Last modification [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * in RFC 3339 format, e.g., `"2016-08-15T23:59:33.123Z"`
     * would indicate the UTC time (denoted by `Z`) of August 15, 2016 at 23:59:33 and 123 milliseconds.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * Last modification [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * in RFC 3339 format, e.g., `"2016-08-15T23:59:33.123Z"`
     * would indicate the UTC time (denoted by `Z`) of August 15, 2016 at 23:59:33 and 123 milliseconds.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Version.
     *
     * The version of the object. When updating an object, the version supplied
     * must match the version in the database, otherwise the write will be rejected as conflicting.
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * The version of the object. When updating an object, the version supplied
     * must match the version in the database, otherwise the write will be rejected as conflicting.
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }

    /**
     * Returns Is Deleted.
     *
     * If `true`, the object has been deleted from the database. Must be `false` for new objects
     * being inserted. When deleted, the `updated_at` field will equal the deletion time.
     */
    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    /**
     * Sets Is Deleted.
     *
     * If `true`, the object has been deleted from the database. Must be `false` for new objects
     * being inserted. When deleted, the `updated_at` field will equal the deletion time.
     *
     * @maps is_deleted
     */
    public function setIsDeleted(?bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

    /**
     * Returns Custom Attribute Values.
     *
     * Application-defined key/value attributes that are set at a global (location-independent) level.
     * Custom Attribute Values are intended to store additional information about a Catalog Object
     * or associations with an entity in another system. Do not use custom attributes
     * to store any sensitive information (personally identifiable information, card details, etc.).
     *
     * For CustomAttributesDefinitions defined by the app making the request, the map key is the key
     * defined in the
     * `CatalogCustomAttributeDefinition` (e.g. “reference_id”). For custom attributes created by other
     * apps, the map key is
     * the key defined in `CatalogCustomAttributeDefinition` prefixed with the application ID and a colon
     * (eg. “abcd1234:reference_id”).
     */
    public function getCustomAttributeValues(): ?array
    {
        return $this->customAttributeValues;
    }

    /**
     * Sets Custom Attribute Values.
     *
     * Application-defined key/value attributes that are set at a global (location-independent) level.
     * Custom Attribute Values are intended to store additional information about a Catalog Object
     * or associations with an entity in another system. Do not use custom attributes
     * to store any sensitive information (personally identifiable information, card details, etc.).
     *
     * For CustomAttributesDefinitions defined by the app making the request, the map key is the key
     * defined in the
     * `CatalogCustomAttributeDefinition` (e.g. “reference_id”). For custom attributes created by other
     * apps, the map key is
     * the key defined in `CatalogCustomAttributeDefinition` prefixed with the application ID and a colon
     * (eg. “abcd1234:reference_id”).
     *
     * @maps custom_attribute_values
     */
    public function setCustomAttributeValues(?array $customAttributeValues): void
    {
        $this->customAttributeValues = $customAttributeValues;
    }

    /**
     * Returns Catalog V1 Ids.
     *
     * The Connect v1 IDs for this object at each location where it is present, where they
     * differ from the object's Connect V2 ID. The field will only be present for objects that
     * have been created or modified by legacy APIs.
     *
     * @return CatalogV1Id[]|null
     */
    public function getCatalogV1Ids(): ?array
    {
        return $this->catalogV1Ids;
    }

    /**
     * Sets Catalog V1 Ids.
     *
     * The Connect v1 IDs for this object at each location where it is present, where they
     * differ from the object's Connect V2 ID. The field will only be present for objects that
     * have been created or modified by legacy APIs.
     *
     * @maps catalog_v1_ids
     *
     * @param CatalogV1Id[]|null $catalogV1Ids
     */
    public function setCatalogV1Ids(?array $catalogV1Ids): void
    {
        $this->catalogV1Ids = $catalogV1Ids;
    }

    /**
     * Returns Present at All Locations.
     *
     * If `true`, this object is present at all locations (including future locations), except where
     * specified in
     * the `absent_at_location_ids` field. If `false`, this object is not present at any locations
     * (including future locations),
     * except where specified in the `present_at_location_ids` field. If not specified, defaults to `true`.
     */
    public function getPresentAtAllLocations(): ?bool
    {
        return $this->presentAtAllLocations;
    }

    /**
     * Sets Present at All Locations.
     *
     * If `true`, this object is present at all locations (including future locations), except where
     * specified in
     * the `absent_at_location_ids` field. If `false`, this object is not present at any locations
     * (including future locations),
     * except where specified in the `present_at_location_ids` field. If not specified, defaults to `true`.
     *
     * @maps present_at_all_locations
     */
    public function setPresentAtAllLocations(?bool $presentAtAllLocations): void
    {
        $this->presentAtAllLocations = $presentAtAllLocations;
    }

    /**
     * Returns Present at Location Ids.
     *
     * A list of locations where the object is present, even if `present_at_all_locations` is `false`.
     *
     * @return string[]|null
     */
    public function getPresentAtLocationIds(): ?array
    {
        return $this->presentAtLocationIds;
    }

    /**
     * Sets Present at Location Ids.
     *
     * A list of locations where the object is present, even if `present_at_all_locations` is `false`.
     *
     * @maps present_at_location_ids
     *
     * @param string[]|null $presentAtLocationIds
     */
    public function setPresentAtLocationIds(?array $presentAtLocationIds): void
    {
        $this->presentAtLocationIds = $presentAtLocationIds;
    }

    /**
     * Returns Absent at Location Ids.
     *
     * A list of locations where the object is not present, even if `present_at_all_locations` is `true`.
     *
     * @return string[]|null
     */
    public function getAbsentAtLocationIds(): ?array
    {
        return $this->absentAtLocationIds;
    }

    /**
     * Sets Absent at Location Ids.
     *
     * A list of locations where the object is not present, even if `present_at_all_locations` is `true`.
     *
     * @maps absent_at_location_ids
     *
     * @param string[]|null $absentAtLocationIds
     */
    public function setAbsentAtLocationIds(?array $absentAtLocationIds): void
    {
        $this->absentAtLocationIds = $absentAtLocationIds;
    }

    /**
     * Returns Image Id.
     *
     * Identifies the `CatalogImage` attached to this `CatalogObject`.
     */
    public function getImageId(): ?string
    {
        return $this->imageId;
    }

    /**
     * Sets Image Id.
     *
     * Identifies the `CatalogImage` attached to this `CatalogObject`.
     *
     * @maps image_id
     */
    public function setImageId(?string $imageId): void
    {
        $this->imageId = $imageId;
    }

    /**
     * Returns Item Data.
     *
     * An item (i.e., product family) in the Catalog object model.
     */
    public function getItemData(): ?CatalogItem
    {
        return $this->itemData;
    }

    /**
     * Sets Item Data.
     *
     * An item (i.e., product family) in the Catalog object model.
     *
     * @maps item_data
     */
    public function setItemData(?CatalogItem $itemData): void
    {
        $this->itemData = $itemData;
    }

    /**
     * Returns Category Data.
     *
     * A category to which a `CatalogItem` belongs in the `Catalog` object model.
     */
    public function getCategoryData(): ?CatalogCategory
    {
        return $this->categoryData;
    }

    /**
     * Sets Category Data.
     *
     * A category to which a `CatalogItem` belongs in the `Catalog` object model.
     *
     * @maps category_data
     */
    public function setCategoryData(?CatalogCategory $categoryData): void
    {
        $this->categoryData = $categoryData;
    }

    /**
     * Returns Item Variation Data.
     *
     * An item variation (i.e., product) in the Catalog object model. Each item
     * may have a maximum of 250 item variations.
     */
    public function getItemVariationData(): ?CatalogItemVariation
    {
        return $this->itemVariationData;
    }

    /**
     * Sets Item Variation Data.
     *
     * An item variation (i.e., product) in the Catalog object model. Each item
     * may have a maximum of 250 item variations.
     *
     * @maps item_variation_data
     */
    public function setItemVariationData(?CatalogItemVariation $itemVariationData): void
    {
        $this->itemVariationData = $itemVariationData;
    }

    /**
     * Returns Tax Data.
     *
     * A tax in the Catalog object model.
     */
    public function getTaxData(): ?CatalogTax
    {
        return $this->taxData;
    }

    /**
     * Sets Tax Data.
     *
     * A tax in the Catalog object model.
     *
     * @maps tax_data
     */
    public function setTaxData(?CatalogTax $taxData): void
    {
        $this->taxData = $taxData;
    }

    /**
     * Returns Discount Data.
     *
     * A discount in the Catalog object model.
     */
    public function getDiscountData(): ?CatalogDiscount
    {
        return $this->discountData;
    }

    /**
     * Sets Discount Data.
     *
     * A discount in the Catalog object model.
     *
     * @maps discount_data
     */
    public function setDiscountData(?CatalogDiscount $discountData): void
    {
        $this->discountData = $discountData;
    }

    /**
     * Returns Modifier List Data.
     *
     * A modifier list in the Catalog object model. A `CatalogModifierList`
     * contains `CatalogModifier` objects that can be applied to a `CatalogItem` at
     * the time of sale.
     *
     * For example, a modifier list "Condiments" that would apply to a "Hot Dog"
     * `CatalogItem` might contain `CatalogModifier`s "Ketchup", "Mustard", and "Relish".
     * The `selection_type` field specifies whether or not multiple selections from
     * the modifier list are allowed.
     */
    public function getModifierListData(): ?CatalogModifierList
    {
        return $this->modifierListData;
    }

    /**
     * Sets Modifier List Data.
     *
     * A modifier list in the Catalog object model. A `CatalogModifierList`
     * contains `CatalogModifier` objects that can be applied to a `CatalogItem` at
     * the time of sale.
     *
     * For example, a modifier list "Condiments" that would apply to a "Hot Dog"
     * `CatalogItem` might contain `CatalogModifier`s "Ketchup", "Mustard", and "Relish".
     * The `selection_type` field specifies whether or not multiple selections from
     * the modifier list are allowed.
     *
     * @maps modifier_list_data
     */
    public function setModifierListData(?CatalogModifierList $modifierListData): void
    {
        $this->modifierListData = $modifierListData;
    }

    /**
     * Returns Modifier Data.
     *
     * A modifier in the Catalog object model.
     */
    public function getModifierData(): ?CatalogModifier
    {
        return $this->modifierData;
    }

    /**
     * Sets Modifier Data.
     *
     * A modifier in the Catalog object model.
     *
     * @maps modifier_data
     */
    public function setModifierData(?CatalogModifier $modifierData): void
    {
        $this->modifierData = $modifierData;
    }

    /**
     * Returns Time Period Data.
     *
     * Represents a time period - either a single period or a repeating period.
     */
    public function getTimePeriodData(): ?CatalogTimePeriod
    {
        return $this->timePeriodData;
    }

    /**
     * Sets Time Period Data.
     *
     * Represents a time period - either a single period or a repeating period.
     *
     * @maps time_period_data
     */
    public function setTimePeriodData(?CatalogTimePeriod $timePeriodData): void
    {
        $this->timePeriodData = $timePeriodData;
    }

    /**
     * Returns Product Set Data.
     *
     * Represents a collection of catalog objects for the purpose of applying a
     * `PricingRule`. Including a catalog object will include all of its subtypes.
     * For example, including a category in a product set will include all of its
     * items and associated item variations in the product set. Including an item in
     * a product set will also include its item variations.
     */
    public function getProductSetData(): ?CatalogProductSet
    {
        return $this->productSetData;
    }

    /**
     * Sets Product Set Data.
     *
     * Represents a collection of catalog objects for the purpose of applying a
     * `PricingRule`. Including a catalog object will include all of its subtypes.
     * For example, including a category in a product set will include all of its
     * items and associated item variations in the product set. Including an item in
     * a product set will also include its item variations.
     *
     * @maps product_set_data
     */
    public function setProductSetData(?CatalogProductSet $productSetData): void
    {
        $this->productSetData = $productSetData;
    }

    /**
     * Returns Pricing Rule Data.
     *
     * Defines how prices are modified or set for items that match the pricing rule
     * during the active time period.
     */
    public function getPricingRuleData(): ?CatalogPricingRule
    {
        return $this->pricingRuleData;
    }

    /**
     * Sets Pricing Rule Data.
     *
     * Defines how prices are modified or set for items that match the pricing rule
     * during the active time period.
     *
     * @maps pricing_rule_data
     */
    public function setPricingRuleData(?CatalogPricingRule $pricingRuleData): void
    {
        $this->pricingRuleData = $pricingRuleData;
    }

    /**
     * Returns Image Data.
     *
     * An image file to use in Square catalogs. Can be associated with catalog
     * items, item variations, and categories.
     */
    public function getImageData(): ?CatalogImage
    {
        return $this->imageData;
    }

    /**
     * Sets Image Data.
     *
     * An image file to use in Square catalogs. Can be associated with catalog
     * items, item variations, and categories.
     *
     * @maps image_data
     */
    public function setImageData(?CatalogImage $imageData): void
    {
        $this->imageData = $imageData;
    }

    /**
     * Returns Measurement Unit Data.
     *
     * Represents the unit used to measure a `CatalogItemVariation` and
     * specifies the precision for decimal quantities.
     */
    public function getMeasurementUnitData(): ?CatalogMeasurementUnit
    {
        return $this->measurementUnitData;
    }

    /**
     * Sets Measurement Unit Data.
     *
     * Represents the unit used to measure a `CatalogItemVariation` and
     * specifies the precision for decimal quantities.
     *
     * @maps measurement_unit_data
     */
    public function setMeasurementUnitData(?CatalogMeasurementUnit $measurementUnitData): void
    {
        $this->measurementUnitData = $measurementUnitData;
    }

    /**
     * Returns Item Option Data.
     *
     * A group of variations for a `CatalogItem`.
     */
    public function getItemOptionData(): ?CatalogItemOption
    {
        return $this->itemOptionData;
    }

    /**
     * Sets Item Option Data.
     *
     * A group of variations for a `CatalogItem`.
     *
     * @maps item_option_data
     */
    public function setItemOptionData(?CatalogItemOption $itemOptionData): void
    {
        $this->itemOptionData = $itemOptionData;
    }

    /**
     * Returns Item Option Value Data.
     *
     * An enumerated value that can link a
     * `CatalogItemVariation` to an item option as one of
     * its item option values.
     */
    public function getItemOptionValueData(): ?CatalogItemOptionValue
    {
        return $this->itemOptionValueData;
    }

    /**
     * Sets Item Option Value Data.
     *
     * An enumerated value that can link a
     * `CatalogItemVariation` to an item option as one of
     * its item option values.
     *
     * @maps item_option_value_data
     */
    public function setItemOptionValueData(?CatalogItemOptionValue $itemOptionValueData): void
    {
        $this->itemOptionValueData = $itemOptionValueData;
    }

    /**
     * Returns Custom Attribute Definition Data.
     *
     * Contains information defining a custom attribute. Custom attributes are
     * intended to store additional information about a catalog object or to associate a
     * catalog object with an entity in another system. Do not use custom attributes
     * to store any sensitive information (personally identifiable information, card details, etc.).
     * [Read more about custom attributes](https://developer.squareup.com/docs/catalog-api/add-custom-
     * attributes)
     */
    public function getCustomAttributeDefinitionData(): ?CatalogCustomAttributeDefinition
    {
        return $this->customAttributeDefinitionData;
    }

    /**
     * Sets Custom Attribute Definition Data.
     *
     * Contains information defining a custom attribute. Custom attributes are
     * intended to store additional information about a catalog object or to associate a
     * catalog object with an entity in another system. Do not use custom attributes
     * to store any sensitive information (personally identifiable information, card details, etc.).
     * [Read more about custom attributes](https://developer.squareup.com/docs/catalog-api/add-custom-
     * attributes)
     *
     * @maps custom_attribute_definition_data
     */
    public function setCustomAttributeDefinitionData(
        ?CatalogCustomAttributeDefinition $customAttributeDefinitionData
    ): void {
        $this->customAttributeDefinitionData = $customAttributeDefinitionData;
    }

    /**
     * Returns Quick Amounts Settings Data.
     *
     * A parent Catalog Object model represents a set of Quick Amounts and the settings control the amounts.
     */
    public function getQuickAmountsSettingsData(): ?CatalogQuickAmountsSettings
    {
        return $this->quickAmountsSettingsData;
    }

    /**
     * Sets Quick Amounts Settings Data.
     *
     * A parent Catalog Object model represents a set of Quick Amounts and the settings control the amounts.
     *
     * @maps quick_amounts_settings_data
     */
    public function setQuickAmountsSettingsData(?CatalogQuickAmountsSettings $quickAmountsSettingsData): void
    {
        $this->quickAmountsSettingsData = $quickAmountsSettingsData;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['type']                          = $this->type;
        $json['id']                            = $this->id;
        $json['updated_at']                    = $this->updatedAt;
        $json['version']                       = $this->version;
        $json['is_deleted']                    = $this->isDeleted;
        $json['custom_attribute_values']       = $this->customAttributeValues;
        $json['catalog_v1_ids']                = $this->catalogV1Ids;
        $json['present_at_all_locations']      = $this->presentAtAllLocations;
        $json['present_at_location_ids']       = $this->presentAtLocationIds;
        $json['absent_at_location_ids']        = $this->absentAtLocationIds;
        $json['image_id']                      = $this->imageId;
        $json['item_data']                     = $this->itemData;
        $json['category_data']                 = $this->categoryData;
        $json['item_variation_data']           = $this->itemVariationData;
        $json['tax_data']                      = $this->taxData;
        $json['discount_data']                 = $this->discountData;
        $json['modifier_list_data']            = $this->modifierListData;
        $json['modifier_data']                 = $this->modifierData;
        $json['time_period_data']              = $this->timePeriodData;
        $json['product_set_data']              = $this->productSetData;
        $json['pricing_rule_data']             = $this->pricingRuleData;
        $json['image_data']                    = $this->imageData;
        $json['measurement_unit_data']         = $this->measurementUnitData;
        $json['item_option_data']              = $this->itemOptionData;
        $json['item_option_value_data']        = $this->itemOptionValueData;
        $json['custom_attribute_definition_data'] = $this->customAttributeDefinitionData;
        $json['quick_amounts_settings_data']   = $this->quickAmountsSettingsData;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
