<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * A list of modifiers applicable to items at the time of sale.
 *
 * For example, a "Condiments" modifier list applicable to a "Hot Dog" item
 * may contain "Ketchup", "Mustard", and "Relish" modifiers.
 * Use the `selection_type` field to specify whether or not multiple selections from
 * the modifier list are allowed.
 */
class CatalogModifierList implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var int|null
     */
    private $ordinal;

    /**
     * @var string|null
     */
    private $selectionType;

    /**
     * @var CatalogObject[]|null
     */
    private $modifiers;

    /**
     * @var string[]|null
     */
    private $imageIds;

    /**
     * Returns Name.
     *
     * The name for the `CatalogModifierList` instance. This is a searchable attribute for use in
     * applicable query filters, and its value length is of Unicode code points.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name for the `CatalogModifierList` instance. This is a searchable attribute for use in
     * applicable query filters, and its value length is of Unicode code points.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Ordinal.
     *
     * Determines where this modifier list appears in a list of `CatalogModifierList` values.
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * Sets Ordinal.
     *
     * Determines where this modifier list appears in a list of `CatalogModifierList` values.
     *
     * @maps ordinal
     */
    public function setOrdinal(?int $ordinal): void
    {
        $this->ordinal = $ordinal;
    }

    /**
     * Returns Selection Type.
     *
     * Indicates whether a CatalogModifierList supports multiple selections.
     */
    public function getSelectionType(): ?string
    {
        return $this->selectionType;
    }

    /**
     * Sets Selection Type.
     *
     * Indicates whether a CatalogModifierList supports multiple selections.
     *
     * @maps selection_type
     */
    public function setSelectionType(?string $selectionType): void
    {
        $this->selectionType = $selectionType;
    }

    /**
     * Returns Modifiers.
     *
     * The options included in the `CatalogModifierList`.
     * You must include at least one `CatalogModifier`.
     * Each CatalogObject must have type `MODIFIER` and contain
     * `CatalogModifier` data.
     *
     * @return CatalogObject[]|null
     */
    public function getModifiers(): ?array
    {
        return $this->modifiers;
    }

    /**
     * Sets Modifiers.
     *
     * The options included in the `CatalogModifierList`.
     * You must include at least one `CatalogModifier`.
     * Each CatalogObject must have type `MODIFIER` and contain
     * `CatalogModifier` data.
     *
     * @maps modifiers
     *
     * @param CatalogObject[]|null $modifiers
     */
    public function setModifiers(?array $modifiers): void
    {
        $this->modifiers = $modifiers;
    }

    /**
     * Returns Image Ids.
     *
     * The IDs of images associated with this `CatalogModifierList` instance.
     * Currently these images are not displayed by Square, but are free to be displayed in 3rd party
     * applications.
     *
     * @return string[]|null
     */
    public function getImageIds(): ?array
    {
        return $this->imageIds;
    }

    /**
     * Sets Image Ids.
     *
     * The IDs of images associated with this `CatalogModifierList` instance.
     * Currently these images are not displayed by Square, but are free to be displayed in 3rd party
     * applications.
     *
     * @maps image_ids
     *
     * @param string[]|null $imageIds
     */
    public function setImageIds(?array $imageIds): void
    {
        $this->imageIds = $imageIds;
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
        if (isset($this->name)) {
            $json['name']           = $this->name;
        }
        if (isset($this->ordinal)) {
            $json['ordinal']        = $this->ordinal;
        }
        if (isset($this->selectionType)) {
            $json['selection_type'] = $this->selectionType;
        }
        if (isset($this->modifiers)) {
            $json['modifiers']      = $this->modifiers;
        }
        if (isset($this->imageIds)) {
            $json['image_ids']      = $this->imageIds;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
