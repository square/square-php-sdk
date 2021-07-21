<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * An item variation (i.e., product) in the Catalog object model. Each item
 * may have a maximum of 250 item variations.
 */
class CatalogItemVariation implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $itemId;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $sku;

    /**
     * @var string|null
     */
    private $upc;

    /**
     * @var int|null
     */
    private $ordinal;

    /**
     * @var string|null
     */
    private $pricingType;

    /**
     * @var Money|null
     */
    private $priceMoney;

    /**
     * @var ItemVariationLocationOverrides[]|null
     */
    private $locationOverrides;

    /**
     * @var bool|null
     */
    private $trackInventory;

    /**
     * @var string|null
     */
    private $inventoryAlertType;

    /**
     * @var int|null
     */
    private $inventoryAlertThreshold;

    /**
     * @var string|null
     */
    private $userData;

    /**
     * @var int|null
     */
    private $serviceDuration;

    /**
     * @var bool|null
     */
    private $availableForBooking;

    /**
     * @var CatalogItemOptionValueForItemVariation[]|null
     */
    private $itemOptionValues;

    /**
     * @var string|null
     */
    private $measurementUnitId;

    /**
     * @var bool|null
     */
    private $stockable;

    /**
     * @var string[]|null
     */
    private $teamMemberIds;

    /**
     * @var CatalogStockConversion|null
     */
    private $stockableConversion;

    /**
     * Returns Item Id.
     *
     * The ID of the `CatalogItem` associated with this item variation.
     */
    public function getItemId(): ?string
    {
        return $this->itemId;
    }

    /**
     * Sets Item Id.
     *
     * The ID of the `CatalogItem` associated with this item variation.
     *
     * @maps item_id
     */
    public function setItemId(?string $itemId): void
    {
        $this->itemId = $itemId;
    }

    /**
     * Returns Name.
     *
     * The item variation's name. This is a searchable attribute for use in applicable query filters, and
     * its value length is of Unicode code points.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The item variation's name. This is a searchable attribute for use in applicable query filters, and
     * its value length is of Unicode code points.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Sku.
     *
     * The item variation's SKU, if any. This is a searchable attribute for use in applicable query filters.
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * Sets Sku.
     *
     * The item variation's SKU, if any. This is a searchable attribute for use in applicable query filters.
     *
     * @maps sku
     */
    public function setSku(?string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * Returns Upc.
     *
     * The universal product code (UPC) of the item variation, if any. This is a searchable attribute for
     * use in applicable query filters.
     *
     * The value of this attribute should be a number of 12-14 digits long.  This restriction is enforced
     * on the Square Seller Dashboard,
     * Square Point of Sale or Retail Point of Sale apps, where this attribute shows in the GTIN field. If
     * a non-compliant UPC value is assigned
     * to this attribute using the API, the value is not editable on the Seller Dashboard, Square Point of
     * Sale or Retail Point of Sale apps
     * unless it is updated to fit the expected format.
     */
    public function getUpc(): ?string
    {
        return $this->upc;
    }

    /**
     * Sets Upc.
     *
     * The universal product code (UPC) of the item variation, if any. This is a searchable attribute for
     * use in applicable query filters.
     *
     * The value of this attribute should be a number of 12-14 digits long.  This restriction is enforced
     * on the Square Seller Dashboard,
     * Square Point of Sale or Retail Point of Sale apps, where this attribute shows in the GTIN field. If
     * a non-compliant UPC value is assigned
     * to this attribute using the API, the value is not editable on the Seller Dashboard, Square Point of
     * Sale or Retail Point of Sale apps
     * unless it is updated to fit the expected format.
     *
     * @maps upc
     */
    public function setUpc(?string $upc): void
    {
        $this->upc = $upc;
    }

    /**
     * Returns Ordinal.
     *
     * The order in which this item variation should be displayed. This value is read-only. On writes, the
     * ordinal
     * for each item variation within a parent `CatalogItem` is set according to the item variations's
     * position. On reads, the value is not guaranteed to be sequential or unique.
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * Sets Ordinal.
     *
     * The order in which this item variation should be displayed. This value is read-only. On writes, the
     * ordinal
     * for each item variation within a parent `CatalogItem` is set according to the item variations's
     * position. On reads, the value is not guaranteed to be sequential or unique.
     *
     * @maps ordinal
     */
    public function setOrdinal(?int $ordinal): void
    {
        $this->ordinal = $ordinal;
    }

    /**
     * Returns Pricing Type.
     *
     * Indicates whether the price of a CatalogItemVariation should be entered manually at the time of sale.
     */
    public function getPricingType(): ?string
    {
        return $this->pricingType;
    }

    /**
     * Sets Pricing Type.
     *
     * Indicates whether the price of a CatalogItemVariation should be entered manually at the time of sale.
     *
     * @maps pricing_type
     */
    public function setPricingType(?string $pricingType): void
    {
        $this->pricingType = $pricingType;
    }

    /**
     * Returns Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getPriceMoney(): ?Money
    {
        return $this->priceMoney;
    }

    /**
     * Sets Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps price_money
     */
    public function setPriceMoney(?Money $priceMoney): void
    {
        $this->priceMoney = $priceMoney;
    }

    /**
     * Returns Location Overrides.
     *
     * Per-location price and inventory overrides.
     *
     * @return ItemVariationLocationOverrides[]|null
     */
    public function getLocationOverrides(): ?array
    {
        return $this->locationOverrides;
    }

    /**
     * Sets Location Overrides.
     *
     * Per-location price and inventory overrides.
     *
     * @maps location_overrides
     *
     * @param ItemVariationLocationOverrides[]|null $locationOverrides
     */
    public function setLocationOverrides(?array $locationOverrides): void
    {
        $this->locationOverrides = $locationOverrides;
    }

    /**
     * Returns Track Inventory.
     *
     * If `true`, inventory tracking is active for the variation.
     */
    public function getTrackInventory(): ?bool
    {
        return $this->trackInventory;
    }

    /**
     * Sets Track Inventory.
     *
     * If `true`, inventory tracking is active for the variation.
     *
     * @maps track_inventory
     */
    public function setTrackInventory(?bool $trackInventory): void
    {
        $this->trackInventory = $trackInventory;
    }

    /**
     * Returns Inventory Alert Type.
     *
     * Indicates whether Square should alert the merchant when the inventory quantity of a
     * CatalogItemVariation is low.
     */
    public function getInventoryAlertType(): ?string
    {
        return $this->inventoryAlertType;
    }

    /**
     * Sets Inventory Alert Type.
     *
     * Indicates whether Square should alert the merchant when the inventory quantity of a
     * CatalogItemVariation is low.
     *
     * @maps inventory_alert_type
     */
    public function setInventoryAlertType(?string $inventoryAlertType): void
    {
        $this->inventoryAlertType = $inventoryAlertType;
    }

    /**
     * Returns Inventory Alert Threshold.
     *
     * If the inventory quantity for the variation is less than or equal to this value and
     * `inventory_alert_type`
     * is `LOW_QUANTITY`, the variation displays an alert in the merchant dashboard.
     *
     * This value is always an integer.
     */
    public function getInventoryAlertThreshold(): ?int
    {
        return $this->inventoryAlertThreshold;
    }

    /**
     * Sets Inventory Alert Threshold.
     *
     * If the inventory quantity for the variation is less than or equal to this value and
     * `inventory_alert_type`
     * is `LOW_QUANTITY`, the variation displays an alert in the merchant dashboard.
     *
     * This value is always an integer.
     *
     * @maps inventory_alert_threshold
     */
    public function setInventoryAlertThreshold(?int $inventoryAlertThreshold): void
    {
        $this->inventoryAlertThreshold = $inventoryAlertThreshold;
    }

    /**
     * Returns User Data.
     *
     * Arbitrary user metadata to associate with the item variation. This attribute value length is of
     * Unicode code points.
     */
    public function getUserData(): ?string
    {
        return $this->userData;
    }

    /**
     * Sets User Data.
     *
     * Arbitrary user metadata to associate with the item variation. This attribute value length is of
     * Unicode code points.
     *
     * @maps user_data
     */
    public function setUserData(?string $userData): void
    {
        $this->userData = $userData;
    }

    /**
     * Returns Service Duration.
     *
     * If the `CatalogItem` that owns this item variation is of type
     * `APPOINTMENTS_SERVICE`, then this is the duration of the service in milliseconds. For
     * example, a 30 minute appointment would have the value `1800000`, which is equal to
     * 30 (minutes) * 60 (seconds per minute) * 1000 (milliseconds per second).
     */
    public function getServiceDuration(): ?int
    {
        return $this->serviceDuration;
    }

    /**
     * Sets Service Duration.
     *
     * If the `CatalogItem` that owns this item variation is of type
     * `APPOINTMENTS_SERVICE`, then this is the duration of the service in milliseconds. For
     * example, a 30 minute appointment would have the value `1800000`, which is equal to
     * 30 (minutes) * 60 (seconds per minute) * 1000 (milliseconds per second).
     *
     * @maps service_duration
     */
    public function setServiceDuration(?int $serviceDuration): void
    {
        $this->serviceDuration = $serviceDuration;
    }

    /**
     * Returns Available for Booking.
     *
     * If the `CatalogItem` that owns this item variation is of type
     * `APPOINTMENTS_SERVICE`, a bool representing whether this service is available for booking.
     */
    public function getAvailableForBooking(): ?bool
    {
        return $this->availableForBooking;
    }

    /**
     * Sets Available for Booking.
     *
     * If the `CatalogItem` that owns this item variation is of type
     * `APPOINTMENTS_SERVICE`, a bool representing whether this service is available for booking.
     *
     * @maps available_for_booking
     */
    public function setAvailableForBooking(?bool $availableForBooking): void
    {
        $this->availableForBooking = $availableForBooking;
    }

    /**
     * Returns Item Option Values.
     *
     * List of item option values associated with this item variation. Listed
     * in the same order as the item options of the parent item.
     *
     * @return CatalogItemOptionValueForItemVariation[]|null
     */
    public function getItemOptionValues(): ?array
    {
        return $this->itemOptionValues;
    }

    /**
     * Sets Item Option Values.
     *
     * List of item option values associated with this item variation. Listed
     * in the same order as the item options of the parent item.
     *
     * @maps item_option_values
     *
     * @param CatalogItemOptionValueForItemVariation[]|null $itemOptionValues
     */
    public function setItemOptionValues(?array $itemOptionValues): void
    {
        $this->itemOptionValues = $itemOptionValues;
    }

    /**
     * Returns Measurement Unit Id.
     *
     * ID of the ‘CatalogMeasurementUnit’ that is used to measure the quantity
     * sold of this item variation. If left unset, the item will be sold in
     * whole quantities.
     */
    public function getMeasurementUnitId(): ?string
    {
        return $this->measurementUnitId;
    }

    /**
     * Sets Measurement Unit Id.
     *
     * ID of the ‘CatalogMeasurementUnit’ that is used to measure the quantity
     * sold of this item variation. If left unset, the item will be sold in
     * whole quantities.
     *
     * @maps measurement_unit_id
     */
    public function setMeasurementUnitId(?string $measurementUnitId): void
    {
        $this->measurementUnitId = $measurementUnitId;
    }

    /**
     * Returns Stockable.
     *
     * Whether stock is counted directly on this variation (TRUE) or only on its components (FALSE).
     * For backward compatibility missing values will be interpreted as TRUE.
     */
    public function getStockable(): ?bool
    {
        return $this->stockable;
    }

    /**
     * Sets Stockable.
     *
     * Whether stock is counted directly on this variation (TRUE) or only on its components (FALSE).
     * For backward compatibility missing values will be interpreted as TRUE.
     *
     * @maps stockable
     */
    public function setStockable(?bool $stockable): void
    {
        $this->stockable = $stockable;
    }

    /**
     * Returns Team Member Ids.
     *
     * Tokens of employees that can perform the service represented by this variation. Only valid for
     * variations of type `APPOINTMENTS_SERVICE`.
     *
     * @return string[]|null
     */
    public function getTeamMemberIds(): ?array
    {
        return $this->teamMemberIds;
    }

    /**
     * Sets Team Member Ids.
     *
     * Tokens of employees that can perform the service represented by this variation. Only valid for
     * variations of type `APPOINTMENTS_SERVICE`.
     *
     * @maps team_member_ids
     *
     * @param string[]|null $teamMemberIds
     */
    public function setTeamMemberIds(?array $teamMemberIds): void
    {
        $this->teamMemberIds = $teamMemberIds;
    }

    /**
     * Returns Stockable Conversion.
     *
     * Represents the rule of conversion between a stockable
     * [CatalogItemVariation]($m/CatalogItemVariation)
     * and a non-stockable sell-by or receive-by `CatalogItemVariation` that
     * share the same underlying stock.
     */
    public function getStockableConversion(): ?CatalogStockConversion
    {
        return $this->stockableConversion;
    }

    /**
     * Sets Stockable Conversion.
     *
     * Represents the rule of conversion between a stockable
     * [CatalogItemVariation]($m/CatalogItemVariation)
     * and a non-stockable sell-by or receive-by `CatalogItemVariation` that
     * share the same underlying stock.
     *
     * @maps stockable_conversion
     */
    public function setStockableConversion(?CatalogStockConversion $stockableConversion): void
    {
        $this->stockableConversion = $stockableConversion;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->itemId)) {
            $json['item_id']                   = $this->itemId;
        }
        if (isset($this->name)) {
            $json['name']                      = $this->name;
        }
        if (isset($this->sku)) {
            $json['sku']                       = $this->sku;
        }
        if (isset($this->upc)) {
            $json['upc']                       = $this->upc;
        }
        if (isset($this->ordinal)) {
            $json['ordinal']                   = $this->ordinal;
        }
        if (isset($this->pricingType)) {
            $json['pricing_type']              = $this->pricingType;
        }
        if (isset($this->priceMoney)) {
            $json['price_money']               = $this->priceMoney;
        }
        if (isset($this->locationOverrides)) {
            $json['location_overrides']        = $this->locationOverrides;
        }
        if (isset($this->trackInventory)) {
            $json['track_inventory']           = $this->trackInventory;
        }
        if (isset($this->inventoryAlertType)) {
            $json['inventory_alert_type']      = $this->inventoryAlertType;
        }
        if (isset($this->inventoryAlertThreshold)) {
            $json['inventory_alert_threshold'] = $this->inventoryAlertThreshold;
        }
        if (isset($this->userData)) {
            $json['user_data']                 = $this->userData;
        }
        if (isset($this->serviceDuration)) {
            $json['service_duration']          = $this->serviceDuration;
        }
        if (isset($this->availableForBooking)) {
            $json['available_for_booking']     = $this->availableForBooking;
        }
        if (isset($this->itemOptionValues)) {
            $json['item_option_values']        = $this->itemOptionValues;
        }
        if (isset($this->measurementUnitId)) {
            $json['measurement_unit_id']       = $this->measurementUnitId;
        }
        if (isset($this->stockable)) {
            $json['stockable']                 = $this->stockable;
        }
        if (isset($this->teamMemberIds)) {
            $json['team_member_ids']           = $this->teamMemberIds;
        }
        if (isset($this->stockableConversion)) {
            $json['stockable_conversion']      = $this->stockableConversion;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
