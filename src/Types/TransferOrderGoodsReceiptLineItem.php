<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A simplified line item for goods receipts in transfer orders
 */
class TransferOrderGoodsReceiptLineItem extends JsonSerializableType
{
    /**
     * @var string $transferOrderLineUid The unique identifier of the Transfer Order line being received
     */
    #[JsonProperty('transfer_order_line_uid')]
    private string $transferOrderLineUid;

    /**
     * The quantity received for this line item as a decimal string (e.g. "10.5").
     * These items will be added to the destination [Location](entity:Location)'s inventory with [InventoryState](entity:InventoryState) of IN_STOCK.
     *
     * @var ?string $quantityReceived
     */
    #[JsonProperty('quantity_received')]
    private ?string $quantityReceived;

    /**
     * The quantity that was damaged during shipping/handling as a decimal string (e.g. "1.5").
     * These items will be added to the destination [Location](entity:Location)'s inventory with [InventoryState](entity:InventoryState) of WASTE.
     *
     * @var ?string $quantityDamaged
     */
    #[JsonProperty('quantity_damaged')]
    private ?string $quantityDamaged;

    /**
     * @var ?string $quantityCanceled The quantity that was canceled during shipping/handling as a decimal string (e.g. "1.5"). These will be immediately added to inventory in the source location.
     */
    #[JsonProperty('quantity_canceled')]
    private ?string $quantityCanceled;

    /**
     * @param array{
     *   transferOrderLineUid: string,
     *   quantityReceived?: ?string,
     *   quantityDamaged?: ?string,
     *   quantityCanceled?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->transferOrderLineUid = $values['transferOrderLineUid'];
        $this->quantityReceived = $values['quantityReceived'] ?? null;
        $this->quantityDamaged = $values['quantityDamaged'] ?? null;
        $this->quantityCanceled = $values['quantityCanceled'] ?? null;
    }

    /**
     * @return string
     */
    public function getTransferOrderLineUid(): string
    {
        return $this->transferOrderLineUid;
    }

    /**
     * @param string $value
     */
    public function setTransferOrderLineUid(string $value): self
    {
        $this->transferOrderLineUid = $value;
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
