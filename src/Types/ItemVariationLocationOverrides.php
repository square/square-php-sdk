<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Price and inventory alerting overrides for a `CatalogItemVariation` at a specific `Location`.
 */
class ItemVariationLocationOverrides extends JsonSerializableType
{
    /**
     * @var ?string $locationId The ID of the `Location`. This can include locations that are deactivated.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?Money $priceMoney The price of the `CatalogItemVariation` at the given `Location`, or blank for variable pricing.
     */
    #[JsonProperty('price_money')]
    private ?Money $priceMoney;

    /**
     * The pricing type (fixed or variable) for the `CatalogItemVariation` at the given `Location`.
     * See [CatalogPricingType](#type-catalogpricingtype) for possible values
     *
     * @var ?value-of<CatalogPricingType> $pricingType
     */
    #[JsonProperty('pricing_type')]
    private ?string $pricingType;

    /**
     * @var ?bool $trackInventory If `true`, inventory tracking is active for the `CatalogItemVariation` at this `Location`.
     */
    #[JsonProperty('track_inventory')]
    private ?bool $trackInventory;

    /**
     * Indicates whether the `CatalogItemVariation` displays an alert when its inventory
     * quantity is less than or equal to its `inventory_alert_threshold`.
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
     * Indicates whether the overridden item variation is sold out at the specified location.
     *
     * When inventory tracking is enabled on the item variation either globally or at the specified location,
     * the item variation is automatically marked as sold out when its inventory count reaches zero. The seller
     * can manually set the item variation as sold out even when the inventory count is greater than zero.
     * Attempts by an application to set this attribute are ignored. Regardless how the sold-out status is set,
     * applications should treat its inventory count as zero when this attribute value is `true`.
     *
     * @var ?bool $soldOut
     */
    #[JsonProperty('sold_out')]
    private ?bool $soldOut;

    /**
     * The seller-assigned timestamp, of the RFC 3339 format, to indicate when this sold-out variation
     * becomes available again at the specified location. Attempts by an application to set this attribute are ignored.
     * When the current time is later than this attribute value, the affected item variation is no longer sold out.
     *
     * @var ?string $soldOutValidUntil
     */
    #[JsonProperty('sold_out_valid_until')]
    private ?string $soldOutValidUntil;

    /**
     * @param array{
     *   locationId?: ?string,
     *   priceMoney?: ?Money,
     *   pricingType?: ?value-of<CatalogPricingType>,
     *   trackInventory?: ?bool,
     *   inventoryAlertType?: ?value-of<InventoryAlertType>,
     *   inventoryAlertThreshold?: ?int,
     *   soldOut?: ?bool,
     *   soldOutValidUntil?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationId = $values['locationId'] ?? null;
        $this->priceMoney = $values['priceMoney'] ?? null;
        $this->pricingType = $values['pricingType'] ?? null;
        $this->trackInventory = $values['trackInventory'] ?? null;
        $this->inventoryAlertType = $values['inventoryAlertType'] ?? null;
        $this->inventoryAlertThreshold = $values['inventoryAlertThreshold'] ?? null;
        $this->soldOut = $values['soldOut'] ?? null;
        $this->soldOutValidUntil = $values['soldOutValidUntil'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
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
     * @return ?bool
     */
    public function getSoldOut(): ?bool
    {
        return $this->soldOut;
    }

    /**
     * @param ?bool $value
     */
    public function setSoldOut(?bool $value = null): self
    {
        $this->soldOut = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSoldOutValidUntil(): ?string
    {
        return $this->soldOutValidUntil;
    }

    /**
     * @param ?string $value
     */
    public function setSoldOutValidUntil(?string $value = null): self
    {
        $this->soldOutValidUntil = $value;
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
