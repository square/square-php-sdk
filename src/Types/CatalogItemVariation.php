<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * An item variation, representing a product for sale, in the Catalog object model. Each [item](entity:CatalogItem) must have at least one
 * item variation and can have at most 250 item variations.
 *
 * An item variation can be sellable, stockable, or both if it has a unit of measure for its count for the sold number of the variation, the stocked
 * number of the variation, or both. For example, when a variation representing wine is stocked and sold by the bottle, the variation is both
 * stockable and sellable. But when a variation of the wine is sold by the glass, the sold units cannot be used as a measure of the stocked units. This by-the-glass
 * variation is sellable, but not stockable. To accurately keep track of the wine's inventory count at any time, the sellable count must be
 * converted to stockable count. Typically, the seller defines this unit conversion. For example, 1 bottle equals 5 glasses. The Square API exposes
 * the `stockable_conversion` property on the variation to specify the conversion. Thus, when two glasses of the wine are sold, the sellable count
 * decreases by 2, and the stockable count automatically decreases by 0.4 bottle according to the conversion.
 */
class CatalogItemVariation extends JsonSerializableType
{
    /**
     * @var ?string $itemId The ID of the `CatalogItem` associated with this item variation.
     */
    #[JsonProperty('item_id')]
    private ?string $itemId;

    /**
     * The item variation's name. This is a searchable attribute for use in applicable query filters.
     *
     * Its value has a maximum length of 255 Unicode code points. However, when the parent [item](entity:CatalogItem)
     * uses [item options](entity:CatalogItemOption), this attribute is auto-generated, read-only, and can be
     * longer than 255 Unicode code points.
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $sku The item variation's SKU, if any. This is a searchable attribute for use in applicable query filters.
     */
    #[JsonProperty('sku')]
    private ?string $sku;

    /**
     * The universal product code (UPC) of the item variation, if any. This is a searchable attribute for use in applicable query filters.
     *
     * The value of this attribute should be a number of 12-14 digits long.  This restriction is enforced on the Square Seller Dashboard,
     * Square Point of Sale or Retail Point of Sale apps, where this attribute shows in the GTIN field. If a non-compliant UPC value is assigned
     * to this attribute using the API, the value is not editable on the Seller Dashboard, Square Point of Sale or Retail Point of Sale apps
     * unless it is updated to fit the expected format.
     *
     * @var ?string $upc
     */
    #[JsonProperty('upc')]
    private ?string $upc;

    /**
     * The order in which this item variation should be displayed. This value is read-only. On writes, the ordinal
     * for each item variation within a parent `CatalogItem` is set according to the item variations's
     * position. On reads, the value is not guaranteed to be sequential or unique.
     *
     * @var ?int $ordinal
     */
    #[JsonProperty('ordinal')]
    private ?int $ordinal;

    /**
     * Indicates whether the item variation's price is fixed or determined at the time
     * of sale.
     * See [CatalogPricingType](#type-catalogpricingtype) for possible values
     *
     * @var ?value-of<CatalogPricingType> $pricingType
     */
    #[JsonProperty('pricing_type')]
    private ?string $pricingType;

    /**
     * @var ?Money $priceMoney The item variation's price, if fixed pricing is used.
     */
    #[JsonProperty('price_money')]
    private ?Money $priceMoney;

    /**
     * @var ?array<ItemVariationLocationOverrides> $locationOverrides Per-location price and inventory overrides.
     */
    #[JsonProperty('location_overrides'), ArrayType([ItemVariationLocationOverrides::class])]
    private ?array $locationOverrides;

    /**
     * @var ?bool $trackInventory If `true`, inventory tracking is active for the variation.
     */
    #[JsonProperty('track_inventory')]
    private ?bool $trackInventory;

    /**
     * Indicates whether the item variation displays an alert when its inventory quantity is less than or equal
     * to its `inventory_alert_threshold`.
     * See [InventoryAlertType](#type-inventoryalerttype) for possible values
     *
     * @var ?value-of<InventoryAlertType> $inventoryAlertType
     */
    #[JsonProperty('inventory_alert_type')]
    private ?string $inventoryAlertType;

    /**
     * If the inventory quantity for the variation is less than or equal to this value and `inventory_alert_type`
     * is `LOW_QUANTITY`, the variation displays an alert in the merchant dashboard.
     *
     * This value is always an integer.
     *
     * @var ?int $inventoryAlertThreshold
     */
    #[JsonProperty('inventory_alert_threshold')]
    private ?int $inventoryAlertThreshold;

    /**
     * @var ?string $userData Arbitrary user metadata to associate with the item variation. This attribute value length is of Unicode code points.
     */
    #[JsonProperty('user_data')]
    private ?string $userData;

    /**
     * If the `CatalogItem` that owns this item variation is of type
     * `APPOINTMENTS_SERVICE`, then this is the duration of the service in milliseconds. For
     * example, a 30 minute appointment would have the value `1800000`, which is equal to
     * 30 (minutes) * 60 (seconds per minute) * 1000 (milliseconds per second).
     *
     * @var ?int $serviceDuration
     */
    #[JsonProperty('service_duration')]
    private ?int $serviceDuration;

    /**
     * If the `CatalogItem` that owns this item variation is of type
     * `APPOINTMENTS_SERVICE`, a bool representing whether this service is available for booking.
     *
     * @var ?bool $availableForBooking
     */
    #[JsonProperty('available_for_booking')]
    private ?bool $availableForBooking;

    /**
     * List of item option values associated with this item variation. Listed
     * in the same order as the item options of the parent item.
     *
     * @var ?array<CatalogItemOptionValueForItemVariation> $itemOptionValues
     */
    #[JsonProperty('item_option_values'), ArrayType([CatalogItemOptionValueForItemVariation::class])]
    private ?array $itemOptionValues;

    /**
     * ID of the ‘CatalogMeasurementUnit’ that is used to measure the quantity
     * sold of this item variation. If left unset, the item will be sold in
     * whole quantities.
     *
     * @var ?string $measurementUnitId
     */
    #[JsonProperty('measurement_unit_id')]
    private ?string $measurementUnitId;

    /**
     * Whether this variation can be sold. The inventory count of a sellable variation indicates
     * the number of units available for sale. When a variation is both stockable and sellable,
     * its sellable inventory count can be smaller than or equal to its stockable count.
     *
     * @var ?bool $sellable
     */
    #[JsonProperty('sellable')]
    private ?bool $sellable;

    /**
     * Whether stock is counted directly on this variation (TRUE) or only on its components (FALSE).
     * When a variation is both stockable and sellable, the inventory count of a stockable variation keeps track of the number of units of this variation in stock
     * and is not an indicator of the number of units of the variation that can be sold.
     *
     * @var ?bool $stockable
     */
    #[JsonProperty('stockable')]
    private ?bool $stockable;

    /**
     * The IDs of images associated with this `CatalogItemVariation` instance.
     * These images will be shown to customers in Square Online Store.
     *
     * @var ?array<string> $imageIds
     */
    #[JsonProperty('image_ids'), ArrayType(['string'])]
    private ?array $imageIds;

    /**
     * Tokens of employees that can perform the service represented by this variation. Only valid for
     * variations of type `APPOINTMENTS_SERVICE`.
     *
     * @var ?array<string> $teamMemberIds
     */
    #[JsonProperty('team_member_ids'), ArrayType(['string'])]
    private ?array $teamMemberIds;

    /**
     * The unit conversion rule, as prescribed by the [CatalogStockConversion](entity:CatalogStockConversion) type,
     * that describes how this non-stockable (i.e., sellable/receivable) item variation is converted
     * to/from the stockable item variation sharing the same parent item. With the stock conversion,
     * you can accurately track inventory when an item variation is sold in one unit, but stocked in
     * another unit.
     *
     * @var ?CatalogStockConversion $stockableConversion
     */
    #[JsonProperty('stockable_conversion')]
    private ?CatalogStockConversion $stockableConversion;

    /**
     * @param array{
     *   itemId?: ?string,
     *   name?: ?string,
     *   sku?: ?string,
     *   upc?: ?string,
     *   ordinal?: ?int,
     *   pricingType?: ?value-of<CatalogPricingType>,
     *   priceMoney?: ?Money,
     *   locationOverrides?: ?array<ItemVariationLocationOverrides>,
     *   trackInventory?: ?bool,
     *   inventoryAlertType?: ?value-of<InventoryAlertType>,
     *   inventoryAlertThreshold?: ?int,
     *   userData?: ?string,
     *   serviceDuration?: ?int,
     *   availableForBooking?: ?bool,
     *   itemOptionValues?: ?array<CatalogItemOptionValueForItemVariation>,
     *   measurementUnitId?: ?string,
     *   sellable?: ?bool,
     *   stockable?: ?bool,
     *   imageIds?: ?array<string>,
     *   teamMemberIds?: ?array<string>,
     *   stockableConversion?: ?CatalogStockConversion,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->itemId = $values['itemId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->sku = $values['sku'] ?? null;
        $this->upc = $values['upc'] ?? null;
        $this->ordinal = $values['ordinal'] ?? null;
        $this->pricingType = $values['pricingType'] ?? null;
        $this->priceMoney = $values['priceMoney'] ?? null;
        $this->locationOverrides = $values['locationOverrides'] ?? null;
        $this->trackInventory = $values['trackInventory'] ?? null;
        $this->inventoryAlertType = $values['inventoryAlertType'] ?? null;
        $this->inventoryAlertThreshold = $values['inventoryAlertThreshold'] ?? null;
        $this->userData = $values['userData'] ?? null;
        $this->serviceDuration = $values['serviceDuration'] ?? null;
        $this->availableForBooking = $values['availableForBooking'] ?? null;
        $this->itemOptionValues = $values['itemOptionValues'] ?? null;
        $this->measurementUnitId = $values['measurementUnitId'] ?? null;
        $this->sellable = $values['sellable'] ?? null;
        $this->stockable = $values['stockable'] ?? null;
        $this->imageIds = $values['imageIds'] ?? null;
        $this->teamMemberIds = $values['teamMemberIds'] ?? null;
        $this->stockableConversion = $values['stockableConversion'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getItemId(): ?string
    {
        return $this->itemId;
    }

    /**
     * @param ?string $value
     */
    public function setItemId(?string $value = null): self
    {
        $this->itemId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param ?string $value
     */
    public function setSku(?string $value = null): self
    {
        $this->sku = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpc(): ?string
    {
        return $this->upc;
    }

    /**
     * @param ?string $value
     */
    public function setUpc(?string $value = null): self
    {
        $this->upc = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * @param ?int $value
     */
    public function setOrdinal(?int $value = null): self
    {
        $this->ordinal = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogPricingType>
     */
    public function getPricingType(): ?string
    {
        return $this->pricingType;
    }

    /**
     * @param ?value-of<CatalogPricingType> $value
     */
    public function setPricingType(?string $value = null): self
    {
        $this->pricingType = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getPriceMoney(): ?Money
    {
        return $this->priceMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setPriceMoney(?Money $value = null): self
    {
        $this->priceMoney = $value;
        return $this;
    }

    /**
     * @return ?array<ItemVariationLocationOverrides>
     */
    public function getLocationOverrides(): ?array
    {
        return $this->locationOverrides;
    }

    /**
     * @param ?array<ItemVariationLocationOverrides> $value
     */
    public function setLocationOverrides(?array $value = null): self
    {
        $this->locationOverrides = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getTrackInventory(): ?bool
    {
        return $this->trackInventory;
    }

    /**
     * @param ?bool $value
     */
    public function setTrackInventory(?bool $value = null): self
    {
        $this->trackInventory = $value;
        return $this;
    }

    /**
     * @return ?value-of<InventoryAlertType>
     */
    public function getInventoryAlertType(): ?string
    {
        return $this->inventoryAlertType;
    }

    /**
     * @param ?value-of<InventoryAlertType> $value
     */
    public function setInventoryAlertType(?string $value = null): self
    {
        $this->inventoryAlertType = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getInventoryAlertThreshold(): ?int
    {
        return $this->inventoryAlertThreshold;
    }

    /**
     * @param ?int $value
     */
    public function setInventoryAlertThreshold(?int $value = null): self
    {
        $this->inventoryAlertThreshold = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUserData(): ?string
    {
        return $this->userData;
    }

    /**
     * @param ?string $value
     */
    public function setUserData(?string $value = null): self
    {
        $this->userData = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getServiceDuration(): ?int
    {
        return $this->serviceDuration;
    }

    /**
     * @param ?int $value
     */
    public function setServiceDuration(?int $value = null): self
    {
        $this->serviceDuration = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAvailableForBooking(): ?bool
    {
        return $this->availableForBooking;
    }

    /**
     * @param ?bool $value
     */
    public function setAvailableForBooking(?bool $value = null): self
    {
        $this->availableForBooking = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogItemOptionValueForItemVariation>
     */
    public function getItemOptionValues(): ?array
    {
        return $this->itemOptionValues;
    }

    /**
     * @param ?array<CatalogItemOptionValueForItemVariation> $value
     */
    public function setItemOptionValues(?array $value = null): self
    {
        $this->itemOptionValues = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMeasurementUnitId(): ?string
    {
        return $this->measurementUnitId;
    }

    /**
     * @param ?string $value
     */
    public function setMeasurementUnitId(?string $value = null): self
    {
        $this->measurementUnitId = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getSellable(): ?bool
    {
        return $this->sellable;
    }

    /**
     * @param ?bool $value
     */
    public function setSellable(?bool $value = null): self
    {
        $this->sellable = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getStockable(): ?bool
    {
        return $this->stockable;
    }

    /**
     * @param ?bool $value
     */
    public function setStockable(?bool $value = null): self
    {
        $this->stockable = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getImageIds(): ?array
    {
        return $this->imageIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setImageIds(?array $value = null): self
    {
        $this->imageIds = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getTeamMemberIds(): ?array
    {
        return $this->teamMemberIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setTeamMemberIds(?array $value = null): self
    {
        $this->teamMemberIds = $value;
        return $this;
    }

    /**
     * @return ?CatalogStockConversion
     */
    public function getStockableConversion(): ?CatalogStockConversion
    {
        return $this->stockableConversion;
    }

    /**
     * @param ?CatalogStockConversion $value
     */
    public function setStockableConversion(?CatalogStockConversion $value = null): self
    {
        $this->stockableConversion = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
