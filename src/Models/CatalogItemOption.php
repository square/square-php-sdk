<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A group of variations for a `CatalogItem`.
 */
class CatalogItemOption implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $displayName;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var bool|null
     */
    private $showColors;

    /**
     * @var CatalogObject[]|null
     */
    private $values;

    /**
     * Returns Name.
     *
     * The item option's display name for the seller. Must be unique across
     * all item options. This is a searchable attribute for use in applicable query filters.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The item option's display name for the seller. Must be unique across
     * all item options. This is a searchable attribute for use in applicable query filters.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Display Name.
     *
     * The item option's display name for the customer. This is a searchable attribute for use in
     * applicable query filters.
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * Sets Display Name.
     *
     * The item option's display name for the customer. This is a searchable attribute for use in
     * applicable query filters.
     *
     * @maps display_name
     */
    public function setDisplayName(?string $displayName): void
    {
        $this->displayName = $displayName;
    }

    /**
     * Returns Description.
     *
     * The item option's human-readable description. Displayed in the Square
     * Point of Sale app for the seller and in the Online Store or on receipts for
     * the buyer. This is a searchable attribute for use in applicable query filters.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * The item option's human-readable description. Displayed in the Square
     * Point of Sale app for the seller and in the Online Store or on receipts for
     * the buyer. This is a searchable attribute for use in applicable query filters.
     *
     * @maps description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Returns Show Colors.
     *
     * If true, display colors for entries in `values` when present.
     */
    public function getShowColors(): ?bool
    {
        return $this->showColors;
    }

    /**
     * Sets Show Colors.
     *
     * If true, display colors for entries in `values` when present.
     *
     * @maps show_colors
     */
    public function setShowColors(?bool $showColors): void
    {
        $this->showColors = $showColors;
    }

    /**
     * Returns Values.
     *
     * A list of CatalogObjects containing the
     * `CatalogItemOptionValue`s for this item.
     *
     * @return CatalogObject[]|null
     */
    public function getValues(): ?array
    {
        return $this->values;
    }

    /**
     * Sets Values.
     *
     * A list of CatalogObjects containing the
     * `CatalogItemOptionValue`s for this item.
     *
     * @maps values
     *
     * @param CatalogObject[]|null $values
     */
    public function setValues(?array $values): void
    {
        $this->values = $values;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->name)) {
            $json['name']         = $this->name;
        }
        if (isset($this->displayName)) {
            $json['display_name'] = $this->displayName;
        }
        if (isset($this->description)) {
            $json['description']  = $this->description;
        }
        if (isset($this->showColors)) {
            $json['show_colors']  = $this->showColors;
        }
        if (isset($this->values)) {
            $json['values']       = $this->values;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
