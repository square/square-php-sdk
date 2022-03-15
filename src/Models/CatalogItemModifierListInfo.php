<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Options to control the properties of a `CatalogModifierList` applied to a `CatalogItem` instance.
 */
class CatalogItemModifierListInfo implements \JsonSerializable
{
    /**
     * @var string
     */
    private $modifierListId;

    /**
     * @var CatalogModifierOverride[]|null
     */
    private $modifierOverrides;

    /**
     * @var int|null
     */
    private $minSelectedModifiers;

    /**
     * @var int|null
     */
    private $maxSelectedModifiers;

    /**
     * @var bool|null
     */
    private $enabled;

    /**
     * @param string $modifierListId
     */
    public function __construct(string $modifierListId)
    {
        $this->modifierListId = $modifierListId;
    }

    /**
     * Returns Modifier List Id.
     *
     * The ID of the `CatalogModifierList` controlled by this `CatalogModifierListInfo`.
     */
    public function getModifierListId(): string
    {
        return $this->modifierListId;
    }

    /**
     * Sets Modifier List Id.
     *
     * The ID of the `CatalogModifierList` controlled by this `CatalogModifierListInfo`.
     *
     * @required
     * @maps modifier_list_id
     */
    public function setModifierListId(string $modifierListId): void
    {
        $this->modifierListId = $modifierListId;
    }

    /**
     * Returns Modifier Overrides.
     *
     * A set of `CatalogModifierOverride` objects that override whether a given `CatalogModifier` is
     * enabled by default.
     *
     * @return CatalogModifierOverride[]|null
     */
    public function getModifierOverrides(): ?array
    {
        return $this->modifierOverrides;
    }

    /**
     * Sets Modifier Overrides.
     *
     * A set of `CatalogModifierOverride` objects that override whether a given `CatalogModifier` is
     * enabled by default.
     *
     * @maps modifier_overrides
     *
     * @param CatalogModifierOverride[]|null $modifierOverrides
     */
    public function setModifierOverrides(?array $modifierOverrides): void
    {
        $this->modifierOverrides = $modifierOverrides;
    }

    /**
     * Returns Min Selected Modifiers.
     *
     * If 0 or larger, the smallest number of `CatalogModifier`s that must be selected from this
     * `CatalogModifierList`.
     */
    public function getMinSelectedModifiers(): ?int
    {
        return $this->minSelectedModifiers;
    }

    /**
     * Sets Min Selected Modifiers.
     *
     * If 0 or larger, the smallest number of `CatalogModifier`s that must be selected from this
     * `CatalogModifierList`.
     *
     * @maps min_selected_modifiers
     */
    public function setMinSelectedModifiers(?int $minSelectedModifiers): void
    {
        $this->minSelectedModifiers = $minSelectedModifiers;
    }

    /**
     * Returns Max Selected Modifiers.
     *
     * If 0 or larger, the largest number of `CatalogModifier`s that can be selected from this
     * `CatalogModifierList`.
     */
    public function getMaxSelectedModifiers(): ?int
    {
        return $this->maxSelectedModifiers;
    }

    /**
     * Sets Max Selected Modifiers.
     *
     * If 0 or larger, the largest number of `CatalogModifier`s that can be selected from this
     * `CatalogModifierList`.
     *
     * @maps max_selected_modifiers
     */
    public function setMaxSelectedModifiers(?int $maxSelectedModifiers): void
    {
        $this->maxSelectedModifiers = $maxSelectedModifiers;
    }

    /**
     * Returns Enabled.
     *
     * If `true`, enable this `CatalogModifierList`. The default value is `true`.
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * Sets Enabled.
     *
     * If `true`, enable this `CatalogModifierList`. The default value is `true`.
     *
     * @maps enabled
     */
    public function setEnabled(?bool $enabled): void
    {
        $this->enabled = $enabled;
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
        $json['modifier_list_id']           = $this->modifierListId;
        if (isset($this->modifierOverrides)) {
            $json['modifier_overrides']     = $this->modifierOverrides;
        }
        if (isset($this->minSelectedModifiers)) {
            $json['min_selected_modifiers'] = $this->minSelectedModifiers;
        }
        if (isset($this->maxSelectedModifiers)) {
            $json['max_selected_modifiers'] = $this->maxSelectedModifiers;
        }
        if (isset($this->enabled)) {
            $json['enabled']                = $this->enabled;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
