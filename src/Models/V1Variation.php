<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1Variation
 */
class V1Variation implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $itemId;

    /**
     * @var int|null
     */
    private $ordinal;

    /**
     * @var string|null
     */
    private $pricingType;

    /**
     * @var V1Money|null
     */
    private $priceMoney;

    /**
     * @var string|null
     */
    private $sku;

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
     * @var string|null
     */
    private $v2Id;

    /**
     * Returns Id.
     *
     * The item variation's unique ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The item variation's unique ID.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Name.
     *
     * The item variation's name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The item variation's name.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Item Id.
     *
     * The ID of the variation's associated item.
     */
    public function getItemId(): ?string
    {
        return $this->itemId;
    }

    /**
     * Sets Item Id.
     *
     * The ID of the variation's associated item.
     *
     * @maps item_id
     */
    public function setItemId(?string $itemId): void
    {
        $this->itemId = $itemId;
    }

    /**
     * Returns Ordinal.
     *
     * Indicates the variation's list position when displayed in Square Point of Sale and the merchant
     * dashboard. If more than one variation for the same item has the same ordinal value, those variations
     * are displayed in alphabetical order
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * Sets Ordinal.
     *
     * Indicates the variation's list position when displayed in Square Point of Sale and the merchant
     * dashboard. If more than one variation for the same item has the same ordinal value, those variations
     * are displayed in alphabetical order
     *
     * @maps ordinal
     */
    public function setOrdinal(?int $ordinal): void
    {
        $this->ordinal = $ordinal;
    }

    /**
     * Returns Pricing Type.
     */
    public function getPricingType(): ?string
    {
        return $this->pricingType;
    }

    /**
     * Sets Pricing Type.
     *
     * @maps pricing_type
     */
    public function setPricingType(?string $pricingType): void
    {
        $this->pricingType = $pricingType;
    }

    /**
     * Returns Price Money.
     */
    public function getPriceMoney(): ?V1Money
    {
        return $this->priceMoney;
    }

    /**
     * Sets Price Money.
     *
     * @maps price_money
     */
    public function setPriceMoney(?V1Money $priceMoney): void
    {
        $this->priceMoney = $priceMoney;
    }

    /**
     * Returns Sku.
     *
     * The item variation's SKU, if any.
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * Sets Sku.
     *
     * The item variation's SKU, if any.
     *
     * @maps sku
     */
    public function setSku(?string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * Returns Track Inventory.
     *
     * If true, inventory tracking is active for the variation.
     */
    public function getTrackInventory(): ?bool
    {
        return $this->trackInventory;
    }

    /**
     * Sets Track Inventory.
     *
     * If true, inventory tracking is active for the variation.
     *
     * @maps track_inventory
     */
    public function setTrackInventory(?bool $trackInventory): void
    {
        $this->trackInventory = $trackInventory;
    }

    /**
     * Returns Inventory Alert Type.
     */
    public function getInventoryAlertType(): ?string
    {
        return $this->inventoryAlertType;
    }

    /**
     * Sets Inventory Alert Type.
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
     * inventory_alert_type is LOW_QUANTITY, the variation displays an alert in the merchant dashboard.
     */
    public function getInventoryAlertThreshold(): ?int
    {
        return $this->inventoryAlertThreshold;
    }

    /**
     * Sets Inventory Alert Threshold.
     *
     * If the inventory quantity for the variation is less than or equal to this value and
     * inventory_alert_type is LOW_QUANTITY, the variation displays an alert in the merchant dashboard.
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
     * Arbitrary metadata associated with the variation. Cannot exceed 255 characters.
     */
    public function getUserData(): ?string
    {
        return $this->userData;
    }

    /**
     * Sets User Data.
     *
     * Arbitrary metadata associated with the variation. Cannot exceed 255 characters.
     *
     * @maps user_data
     */
    public function setUserData(?string $userData): void
    {
        $this->userData = $userData;
    }

    /**
     * Returns V 2 Id.
     *
     * The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations
     * share the same v2 ID.
     */
    public function getV2Id(): ?string
    {
        return $this->v2Id;
    }

    /**
     * Sets V 2 Id.
     *
     * The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations
     * share the same v2 ID.
     *
     * @maps v2_id
     */
    public function setV2Id(?string $v2Id): void
    {
        $this->v2Id = $v2Id;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                      = $this->id;
        $json['name']                    = $this->name;
        $json['item_id']                 = $this->itemId;
        $json['ordinal']                 = $this->ordinal;
        $json['pricing_type']            = $this->pricingType;
        $json['price_money']             = $this->priceMoney;
        $json['sku']                     = $this->sku;
        $json['track_inventory']         = $this->trackInventory;
        $json['inventory_alert_type']    = $this->inventoryAlertType;
        $json['inventory_alert_threshold'] = $this->inventoryAlertThreshold;
        $json['user_data']               = $this->userData;
        $json['v2_id']                   = $this->v2Id;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
