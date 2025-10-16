<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Data for creating a new transfer order line item. Each line item specifies a
 * [CatalogItemVariation](entity:CatalogItemVariation) and quantity to transfer.
 */
class CreateTransferOrderLineData extends JsonSerializableType
{
    /**
     * ID of the [CatalogItemVariation](entity:CatalogItemVariation) to transfer. Must reference a valid
     * item variation in the [Catalog](api:Catalog). The item variation must be:
     * - Active and available for sale
     * - Enabled for inventory tracking
     * - Available at the source location
     *
     * @var string $itemVariationId
     */
    #[JsonProperty('item_variation_id')]
    private string $itemVariationId;

    /**
     * @var string $quantityOrdered Total quantity ordered
     */
    #[JsonProperty('quantity_ordered')]
    private string $quantityOrdered;

    /**
     * @param array{
     *   itemVariationId: string,
     *   quantityOrdered: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->itemVariationId = $values['itemVariationId'];
        $this->quantityOrdered = $values['quantityOrdered'];
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
