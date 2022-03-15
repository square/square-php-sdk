<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * An enumerated value that can link a
 * `CatalogItemVariation` to an item option as one of
 * its item option values.
 */
class CatalogItemOptionValue implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $itemOptionId;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $color;

    /**
     * @var int|null
     */
    private $ordinal;

    /**
     * Returns Item Option Id.
     *
     * Unique ID of the associated item option.
     */
    public function getItemOptionId(): ?string
    {
        return $this->itemOptionId;
    }

    /**
     * Sets Item Option Id.
     *
     * Unique ID of the associated item option.
     *
     * @maps item_option_id
     */
    public function setItemOptionId(?string $itemOptionId): void
    {
        $this->itemOptionId = $itemOptionId;
    }

    /**
     * Returns Name.
     *
     * Name of this item option value. This is a searchable attribute for use in applicable query filters.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * Name of this item option value. This is a searchable attribute for use in applicable query filters.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Description.
     *
     * A human-readable description for the option value. This is a searchable attribute for use in
     * applicable query filters.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * A human-readable description for the option value. This is a searchable attribute for use in
     * applicable query filters.
     *
     * @maps description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Returns Color.
     *
     * The HTML-supported hex color for the item option (e.g., "#ff8d4e85").
     * Only displayed if `show_colors` is enabled on the parent `ItemOption`. When
     * left unset, `color` defaults to white ("#ffffff") when `show_colors` is
     * enabled on the parent `ItemOption`.
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * Sets Color.
     *
     * The HTML-supported hex color for the item option (e.g., "#ff8d4e85").
     * Only displayed if `show_colors` is enabled on the parent `ItemOption`. When
     * left unset, `color` defaults to white ("#ffffff") when `show_colors` is
     * enabled on the parent `ItemOption`.
     *
     * @maps color
     */
    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    /**
     * Returns Ordinal.
     *
     * Determines where this option value appears in a list of option values.
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * Sets Ordinal.
     *
     * Determines where this option value appears in a list of option values.
     *
     * @maps ordinal
     */
    public function setOrdinal(?int $ordinal): void
    {
        $this->ordinal = $ordinal;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->itemOptionId)) {
            $json['item_option_id'] = $this->itemOptionId;
        }
        if (isset($this->name)) {
            $json['name']           = $this->name;
        }
        if (isset($this->description)) {
            $json['description']    = $this->description;
        }
        if (isset($this->color)) {
            $json['color']          = $this->color;
        }
        if (isset($this->ordinal)) {
            $json['ordinal']        = $this->ordinal;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
