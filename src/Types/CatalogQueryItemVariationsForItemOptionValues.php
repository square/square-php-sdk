<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The query filter to return the item variations containing the specified item option value IDs.
 */
class CatalogQueryItemVariationsForItemOptionValues extends JsonSerializableType
{
    /**
     * A set of `CatalogItemOptionValue` IDs to be used to find associated
     * `CatalogItemVariation`s. All ItemVariations that contain all of the given
     * Item Option Values (in any order) will be returned.
     *
     * @var ?array<string> $itemOptionValueIds
     */
    #[JsonProperty('item_option_value_ids'), ArrayType(['string'])]
    private ?array $itemOptionValueIds;

    /**
     * @param array{
     *   itemOptionValueIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->itemOptionValueIds = $values['itemOptionValueIds'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getItemOptionValueIds(): ?array
    {
        return $this->itemOptionValueIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setItemOptionValueIds(?array $value = null): self
    {
        $this->itemOptionValueIds = $value;
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
