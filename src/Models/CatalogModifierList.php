<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A modifier list in the Catalog object model. A `CatalogModifierList`
 * contains `CatalogModifier` objects that can be applied to a `CatalogItem` at
 * the time of sale.
 *
 * For example, a modifier list "Condiments" that would apply to a "Hot Dog"
 * `CatalogItem` might contain `CatalogModifier`s "Ketchup", "Mustard", and "Relish".
 * The `selection_type` field specifies whether or not multiple selections from
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
     * Returns Name.
     *
     * A searchable name for the `CatalogModifierList`. This field has max length of 255 Unicode code
     * points.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * A searchable name for the `CatalogModifierList`. This field has max length of 255 Unicode code
     * points.
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
     * Determines where this `CatalogModifierList` appears in a list of `CatalogModifierList` values.
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * Sets Ordinal.
     *
     * Determines where this `CatalogModifierList` appears in a list of `CatalogModifierList` values.
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['name']          = $this->name;
        $json['ordinal']       = $this->ordinal;
        $json['selection_type'] = $this->selectionType;
        $json['modifiers']     = $this->modifiers;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
