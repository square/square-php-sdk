<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a line item in a transfer order. Each line item tracks a specific
 * [CatalogItemVariation](entity:CatalogItemVariation) being transferred, including ordered quantities
 * and receipt status.
 */
class TransferOrderLine extends JsonSerializableType
{
    /**
     * @var ?string $uid Unique system-generated identifier for the line item. Provide when updating/removing a line via [UpdateTransferOrder](api-endpoint:TransferOrders-UpdateTransferOrder).
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * The required identifier of the [CatalogItemVariation](entity:CatalogItemVariation) being transferred. Must reference
     * a valid catalog item variation that exists in the [Catalog](api:Catalog).
     *
     * @var string $itemVariationId
     */
    #[JsonProperty('item_variation_id')]
    private string $itemVariationId;

    /**
     * Total quantity ordered, formatted as a decimal string (e.g. "10 or 10.0000"). Required to be a positive number.
     *
     * To remove a line item, set `remove` to `true` in [UpdateTransferOrder](api-endpoint:TransferOrders-UpdateTransferOrder).
     *
     * @var string $quantityOrdered
     */
    #[JsonProperty('quantity_ordered')]
    private string $quantityOrdered;

    /**
     * @var ?string $quantityPending Calculated quantity of this line item's yet to be received stock. This is the difference between the total quantity ordered and the sum of quantities received, canceled, and damaged.
     */
    #[JsonProperty('quantity_pending')]
    private ?string $quantityPending;

    /**
     * Quantity received at destination. These items are added to the destination
     * [Location](entity:Location)'s inventory with [InventoryState](entity:InventoryState) of IN_STOCK.
     *
     * This field cannot be updated directly in Create/Update operations, instead use [ReceiveTransferOrder](api-endpoint:TransferOrders-ReceiveTransferOrder).
     *
     * @var ?string $quantityReceived
     */
    #[JsonProperty('quantity_received')]
    private ?string $quantityReceived;

    /**
     * Quantity received in damaged condition. These items are added to the destination
     * [Location](entity:Location)'s inventory with [InventoryState](entity:InventoryState) of WASTE.
     *
     * This field cannot be updated directly in Create/Update operations, instead use [ReceiveTransferOrder](api-endpoint:TransferOrders-ReceiveTransferOrder).
     *
     * @var ?string $quantityDamaged
     */
    #[JsonProperty('quantity_damaged')]
    private ?string $quantityDamaged;

    /**
     * Quantity that was canceled. These items will be immediately added to inventory in the source location.
     *
     * This field cannot be updated directly in Create/Update operations, instead use [ReceiveTransferOrder](api-endpoint:TransferOrders-ReceiveTransferOrder) or [CancelTransferOrder](api-endpoint:TransferOrders-CancelTransferOrder).
     *
     * @var ?string $quantityCanceled
     */
    #[JsonProperty('quantity_canceled')]
    private ?string $quantityCanceled;

    /**
     * @param array{
     *   itemVariationId: string,
     *   quantityOrdered: string,
     *   uid?: ?string,
     *   quantityPending?: ?string,
     *   quantityReceived?: ?string,
     *   quantityDamaged?: ?string,
     *   quantityCanceled?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->itemVariationId = $values['itemVariationId'];
        $this->quantityOrdered = $values['quantityOrdered'];
        $this->quantityPending = $values['quantityPending'] ?? null;
        $this->quantityReceived = $values['quantityReceived'] ?? null;
        $this->quantityDamaged = $values['quantityDamaged'] ?? null;
        $this->quantityCanceled = $values['quantityCanceled'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param ?string $value
     */
    public function setUid(?string $value = null): self
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getItemVariationId(): string
    {
        return $this->itemVariationId;
    }

    /**
     * @param string $value
     */
    public function setItemVariationId(string $value): self
    {
        $this->itemVariationId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuantityOrdered(): string
    {
        return $this->quantityOrdered;
    }

    /**
     * @param string $value
     */
    public function setQuantityOrdered(string $value): self
    {
        $this->quantityOrdered = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getQuantityPending(): ?string
    {
        return $this->quantityPending;
    }

    /**
     * @param ?string $value
     */
    public function setQuantityPending(?string $value = null): self
    {
        $this->quantityPending = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getQuantityReceived(): ?string
    {
        return $this->quantityReceived;
    }

    /**
     * @param ?string $value
     */
    public function setQuantityReceived(?string $value = null): self
    {
        $this->quantityReceived = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getQuantityDamaged(): ?string
    {
        return $this->quantityDamaged;
    }

    /**
     * @param ?string $value
     */
    public function setQuantityDamaged(?string $value = null): self
    {
        $this->quantityDamaged = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getQuantityCanceled(): ?string
    {
        return $this->quantityCanceled;
    }

    /**
     * @param ?string $value
     */
    public function setQuantityCanceled(?string $value = null): self
    {
        $this->quantityCanceled = $value;
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
