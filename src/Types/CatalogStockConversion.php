<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the rule of conversion between a stockable [CatalogItemVariation](entity:CatalogItemVariation)
 * and a non-stockable sell-by or receive-by `CatalogItemVariation` that
 * share the same underlying stock.
 */
class CatalogStockConversion extends JsonSerializableType
{
    /**
     * References to the stockable [CatalogItemVariation](entity:CatalogItemVariation)
     * for this stock conversion. Selling, receiving or recounting the non-stockable `CatalogItemVariation`
     * defined with a stock conversion results in adjustments of this stockable `CatalogItemVariation`.
     * This immutable field must reference a stockable `CatalogItemVariation`
     * that shares the parent [CatalogItem](entity:CatalogItem) of the converted `CatalogItemVariation.`
     *
     * @var string $stockableItemVariationId
     */
    #[JsonProperty('stockable_item_variation_id')]
    private string $stockableItemVariationId;

    /**
     * The quantity of the stockable item variation (as identified by `stockable_item_variation_id`)
     * equivalent to the non-stockable item variation quantity (as specified in `nonstockable_quantity`)
     * as defined by this stock conversion.  It accepts a decimal number in a string format that can take
     * up to 10 digits before the decimal point and up to 5 digits after the decimal point.
     *
     * @var string $stockableQuantity
     */
    #[JsonProperty('stockable_quantity')]
    private string $stockableQuantity;

    /**
     * The converted equivalent quantity of the non-stockable [CatalogItemVariation](entity:CatalogItemVariation)
     * in its measurement unit. The `stockable_quantity` value and this `nonstockable_quantity` value together
     * define the conversion ratio between stockable item variation and the non-stockable item variation.
     * It accepts a decimal number in a string format that can take up to 10 digits before the decimal point
     * and up to 5 digits after the decimal point.
     *
     * @var string $nonstockableQuantity
     */
    #[JsonProperty('nonstockable_quantity')]
    private string $nonstockableQuantity;

    /**
     * @param array{
     *   stockableItemVariationId: string,
     *   stockableQuantity: string,
     *   nonstockableQuantity: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->stockableItemVariationId = $values['stockableItemVariationId'];
        $this->stockableQuantity = $values['stockableQuantity'];
        $this->nonstockableQuantity = $values['nonstockableQuantity'];
    }

    /**
     * @return string
     */
    public function getStockableItemVariationId(): string
    {
        return $this->stockableItemVariationId;
    }

    /**
     * @param string $value
     */
    public function setStockableItemVariationId(string $value): self
    {
        $this->stockableItemVariationId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getStockableQuantity(): string
    {
        return $this->stockableQuantity;
    }

    /**
     * @param string $value
     */
    public function setStockableQuantity(string $value): self
    {
        $this->stockableQuantity = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getNonstockableQuantity(): string
    {
        return $this->nonstockableQuantity;
    }

    /**
     * @param string $value
     */
    public function setNonstockableQuantity(string $value): self
    {
        $this->nonstockableQuantity = $value;
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
