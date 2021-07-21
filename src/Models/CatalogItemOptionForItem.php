<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * An option that can be assigned to an item.
 * For example, a t-shirt item may offer a color option or a size option.
 */
class CatalogItemOptionForItem implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $itemOptionId;

    /**
     * Returns Item Option Id.
     *
     * The unique id of the item option, used to form the dimensions of the item option matrix in a
     * specified order.
     */
    public function getItemOptionId(): ?string
    {
        return $this->itemOptionId;
    }

    /**
     * Sets Item Option Id.
     *
     * The unique id of the item option, used to form the dimensions of the item option matrix in a
     * specified order.
     *
     * @maps item_option_id
     */
    public function setItemOptionId(?string $itemOptionId): void
    {
        $this->itemOptionId = $itemOptionId;
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
            $json['item_option_id'] = $this->itemOptionId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
