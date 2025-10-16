<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The goods receipt details for a transfer order. This object represents a single receipt
 * of goods against a transfer order, tracking:
 *
 * - Which [CatalogItemVariation](entity:CatalogItemVariation)s were received
 * - Quantities received in good condition
 * - Quantities damaged during transit/handling
 * - Quantities canceled during receipt
 *
 * Multiple goods receipts can be created for a single transfer order to handle:
 * - Partial deliveries
 * - Multiple shipments
 * - Split receipts across different dates
 * - Cancellations of specific quantities
 *
 * Each receipt automatically:
 * - Updates the transfer order status
 * - Adjusts received quantities
 * - Updates inventory levels at both source and destination [Location](entity:Location)s
 */
class TransferOrderGoodsReceipt extends JsonSerializableType
{
    /**
     * Line items being received. Each line item specifies:
     * - The item being received
     * - Quantity received in good condition
     * - Quantity received damaged
     * - Quantity canceled
     *
     * Constraints:
     * - Must include at least one line item
     * - Maximum of 1000 line items per receipt
     * - Each line item must reference a valid item from the transfer order
     * - Total of received, damaged, and canceled quantities cannot exceed ordered quantity
     *
     * @var ?array<TransferOrderGoodsReceiptLineItem> $lineItems
     */
    #[JsonProperty('line_items'), ArrayType([TransferOrderGoodsReceiptLineItem::class])]
    private ?array $lineItems;

    /**
     * @param array{
     *   lineItems?: ?array<TransferOrderGoodsReceiptLineItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->lineItems = $values['lineItems'] ?? null;
    }

    /**
     * @return ?array<TransferOrderGoodsReceiptLineItem>
     */
    public function getLineItems(): ?array
    {
        return $this->lineItems;
    }

    /**
     * @param ?array<TransferOrderGoodsReceiptLineItem> $value
     */
    public function setLineItems(?array $value = null): self
    {
        $this->lineItems = $value;
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
