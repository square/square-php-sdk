<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The query filter to return the item variations containing the specified item option value IDs.
 */
class CatalogQueryItemVariationsForItemOptionValues implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $itemOptionValueIds;

    /**
     * Returns Item Option Value Ids.
     *
     * A set of `CatalogItemOptionValue` IDs to be used to find associated
     * `CatalogItemVariation`s. All ItemVariations that contain all of the given
     * Item Option Values (in any order) will be returned.
     *
     * @return string[]|null
     */
    public function getItemOptionValueIds(): ?array
    {
        return $this->itemOptionValueIds;
    }

    /**
     * Sets Item Option Value Ids.
     *
     * A set of `CatalogItemOptionValue` IDs to be used to find associated
     * `CatalogItemVariation`s. All ItemVariations that contain all of the given
     * Item Option Values (in any order) will be returned.
     *
     * @maps item_option_value_ids
     *
     * @param string[]|null $itemOptionValueIds
     */
    public function setItemOptionValueIds(?array $itemOptionValueIds): void
    {
        $this->itemOptionValueIds = $itemOptionValueIds;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->itemOptionValueIds)) {
            $json['item_option_value_ids'] = $this->itemOptionValueIds;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
