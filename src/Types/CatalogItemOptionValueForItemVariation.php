<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A `CatalogItemOptionValue` links an item variation to an item option as
 * an item option value. For example, a t-shirt item may offer a color option and
 * a size option. An item option value would represent each variation of t-shirt:
 * For example, "Color:Red, Size:Small" or "Color:Blue, Size:Medium".
 */
class CatalogItemOptionValueForItemVariation extends JsonSerializableType
{
    /**
     * @var ?string $itemOptionId The unique id of an item option.
     */
    #[JsonProperty('item_option_id')]
    private ?string $itemOptionId;

    /**
     * @var ?string $itemOptionValueId The unique id of the selected value for the item option.
     */
    #[JsonProperty('item_option_value_id')]
    private ?string $itemOptionValueId;

    /**
     * @param array{
     *   itemOptionId?: ?string,
     *   itemOptionValueId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->itemOptionId = $values['itemOptionId'] ?? null;
        $this->itemOptionValueId = $values['itemOptionValueId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getItemOptionId(): ?string
    {
        return $this->itemOptionId;
    }

    /**
     * @param ?string $value
     */
    public function setItemOptionId(?string $value = null): self
    {
        $this->itemOptionId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getItemOptionValueId(): ?string
    {
        return $this->itemOptionValueId;
    }

    /**
     * @param ?string $value
     */
    public function setItemOptionValueId(?string $value = null): self
    {
        $this->itemOptionValueId = $value;
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
