<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A `CatalogItemOptionValue` links an item variation to an item option as
 * an item option value. For example, a t-shirt item may offer a color option and
 * a size option. An item option value would represent each variation of t-shirt:
 * For example, "Color:Red, Size:Small" or "Color:Blue, Size:Medium".
 */
class CatalogItemOptionValueForItemVariation implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $itemOptionId;

    /**
     * @var string|null
     */
    private $itemOptionValueId;

    /**
     * Returns Item Option Id.
     *
     * The unique id of an item option.
     */
    public function getItemOptionId(): ?string
    {
        return $this->itemOptionId;
    }

    /**
     * Sets Item Option Id.
     *
     * The unique id of an item option.
     *
     * @maps item_option_id
     */
    public function setItemOptionId(?string $itemOptionId): void
    {
        $this->itemOptionId = $itemOptionId;
    }

    /**
     * Returns Item Option Value Id.
     *
     * The unique id of the selected value for the item option.
     */
    public function getItemOptionValueId(): ?string
    {
        return $this->itemOptionValueId;
    }

    /**
     * Sets Item Option Value Id.
     *
     * The unique id of the selected value for the item option.
     *
     * @maps item_option_value_id
     */
    public function setItemOptionValueId(?string $itemOptionValueId): void
    {
        $this->itemOptionValueId = $itemOptionValueId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->itemOptionId)) {
            $json['item_option_id']       = $this->itemOptionId;
        }
        if (isset($this->itemOptionValueId)) {
            $json['item_option_value_id'] = $this->itemOptionValueId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
