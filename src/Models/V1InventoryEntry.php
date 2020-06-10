<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1InventoryEntry
 */
class V1InventoryEntry implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $variationId;

    /**
     * @var float|null
     */
    private $quantityOnHand;

    /**
     * Returns Variation Id.
     *
     * The variation that the entry corresponds to.
     */
    public function getVariationId(): ?string
    {
        return $this->variationId;
    }

    /**
     * Sets Variation Id.
     *
     * The variation that the entry corresponds to.
     *
     * @maps variation_id
     */
    public function setVariationId(?string $variationId): void
    {
        $this->variationId = $variationId;
    }

    /**
     * Returns Quantity on Hand.
     *
     * The current available quantity of the item variation.
     */
    public function getQuantityOnHand(): ?float
    {
        return $this->quantityOnHand;
    }

    /**
     * Sets Quantity on Hand.
     *
     * The current available quantity of the item variation.
     *
     * @maps quantity_on_hand
     */
    public function setQuantityOnHand(?float $quantityOnHand): void
    {
        $this->quantityOnHand = $quantityOnHand;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['variation_id']   = $this->variationId;
        $json['quantity_on_hand'] = $this->quantityOnHand;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
