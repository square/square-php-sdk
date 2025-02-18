<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 *  An option that can be assigned to an item.
 * For example, a t-shirt item may offer a color option or a size option.
 */
class CatalogItemOptionForItem extends JsonSerializableType
{
    /**
     * @var ?string $itemOptionId The unique id of the item option, used to form the dimensions of the item option matrix in a specified order.
     */
    #[JsonProperty('item_option_id')]
    private ?string $itemOptionId;

    /**
     * @param array{
     *   itemOptionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->itemOptionId = $values['itemOptionId'] ?? null;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
