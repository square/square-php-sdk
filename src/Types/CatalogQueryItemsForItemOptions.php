<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The query filter to return the items containing the specified item option IDs.
 */
class CatalogQueryItemsForItemOptions extends JsonSerializableType
{
    /**
     * A set of `CatalogItemOption` IDs to be used to find associated
     * `CatalogItem`s. All Items that contain all of the given Item Options (in any order)
     * will be returned.
     *
     * @var ?array<string> $itemOptionIds
     */
    #[JsonProperty('item_option_ids'), ArrayType(['string'])]
    private ?array $itemOptionIds;

    /**
     * @param array{
     *   itemOptionIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->itemOptionIds = $values['itemOptionIds'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getItemOptionIds(): ?array
    {
        return $this->itemOptionIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setItemOptionIds(?array $value = null): self
    {
        $this->itemOptionIds = $value;
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
