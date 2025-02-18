<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * An enumerated value that can link a
 * `CatalogItemVariation` to an item option as one of
 * its item option values.
 */
class CatalogItemOptionValue extends JsonSerializableType
{
    /**
     * @var ?string $itemOptionId Unique ID of the associated item option.
     */
    #[JsonProperty('item_option_id')]
    private ?string $itemOptionId;

    /**
     * @var ?string $name Name of this item option value. This is a searchable attribute for use in applicable query filters.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $description A human-readable description for the option value. This is a searchable attribute for use in applicable query filters.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * The HTML-supported hex color for the item option (e.g., "#ff8d4e85").
     * Only displayed if `show_colors` is enabled on the parent `ItemOption`. When
     * left unset, `color` defaults to white ("#ffffff") when `show_colors` is
     * enabled on the parent `ItemOption`.
     *
     * @var ?string $color
     */
    #[JsonProperty('color')]
    private ?string $color;

    /**
     * @var ?int $ordinal Determines where this option value appears in a list of option values.
     */
    #[JsonProperty('ordinal')]
    private ?int $ordinal;

    /**
     * @param array{
     *   itemOptionId?: ?string,
     *   name?: ?string,
     *   description?: ?string,
     *   color?: ?string,
     *   ordinal?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->itemOptionId = $values['itemOptionId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->color = $values['color'] ?? null;
        $this->ordinal = $values['ordinal'] ?? null;
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param ?string $value
     */
    public function setColor(?string $value = null): self
    {
        $this->color = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * @param ?int $value
     */
    public function setOrdinal(?int $value = null): self
    {
        $this->ordinal = $value;
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
