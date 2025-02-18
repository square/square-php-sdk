<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A group of variations for a `CatalogItem`.
 */
class CatalogItemOption extends JsonSerializableType
{
    /**
     * The item option's display name for the seller. Must be unique across
     * all item options. This is a searchable attribute for use in applicable query filters.
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $displayName The item option's display name for the customer. This is a searchable attribute for use in applicable query filters.
     */
    #[JsonProperty('display_name')]
    private ?string $displayName;

    /**
     * The item option's human-readable description. Displayed in the Square
     * Point of Sale app for the seller and in the Online Store or on receipts for
     * the buyer. This is a searchable attribute for use in applicable query filters.
     *
     * @var ?string $description
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?bool $showColors If true, display colors for entries in `values` when present.
     */
    #[JsonProperty('show_colors')]
    private ?bool $showColors;

    /**
     * A list of CatalogObjects containing the
     * `CatalogItemOptionValue`s for this item.
     *
     * @var ?array<CatalogObject> $values
     */
    #[JsonProperty('values'), ArrayType([CatalogObject::class])]
    private ?array $values;

    /**
     * @param array{
     *   name?: ?string,
     *   displayName?: ?string,
     *   description?: ?string,
     *   showColors?: ?bool,
     *   values?: ?array<CatalogObject>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->displayName = $values['displayName'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->showColors = $values['showColors'] ?? null;
        $this->values = $values['values'] ?? null;
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
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * @param ?string $value
     */
    public function setDisplayName(?string $value = null): self
    {
        $this->displayName = $value;
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
     * @return ?bool
     */
    public function getShowColors(): ?bool
    {
        return $this->showColors;
    }

    /**
     * @param ?bool $value
     */
    public function setShowColors(?bool $value = null): self
    {
        $this->showColors = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogObject>
     */
    public function getValues(): ?array
    {
        return $this->values;
    }

    /**
     * @param ?array<CatalogObject> $value
     */
    public function setValues(?array $value = null): self
    {
        $this->values = $value;
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
