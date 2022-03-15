<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Price and inventory alerting overrides for a `CatalogItemVariation` at a specific `Location`.
 */
class ItemVariationLocationOverrides implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var Money|null
     */
    private $priceMoney;

    /**
     * @var string|null
     */
    private $pricingType;

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
     * Returns Location Id.
     *
     * The ID of the `Location`. This can include locations that are deactivated.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the `Location`. This can include locations that are deactivated.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
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
     * Returns Track Inventory.
     *
     * If `true`, inventory tracking is active for the `CatalogItemVariation` at this `Location`.
     */
    public function getTrackInventory(): ?bool
    {
        return $this->trackInventory;
    }

    /**
     * Sets Track Inventory.
     *
     * If `true`, inventory tracking is active for the `CatalogItemVariation` at this `Location`.
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
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->locationId)) {
            $json['location_id']               = $this->locationId;
        }
        if (isset($this->priceMoney)) {
            $json['price_money']               = $this->priceMoney;
        }
        if (isset($this->pricingType)) {
            $json['pricing_type']              = $this->pricingType;
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
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
