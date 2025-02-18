<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * References a text-based modifier or a list of non text-based modifiers applied to a `CatalogItem` instance
 * and specifies supported behaviors of the application.
 */
class CatalogItemModifierListInfo extends JsonSerializableType
{
    /**
     * @var string $modifierListId The ID of the `CatalogModifierList` controlled by this `CatalogModifierListInfo`.
     */
    #[JsonProperty('modifier_list_id')]
    private string $modifierListId;

    /**
     * @var ?array<CatalogModifierOverride> $modifierOverrides A set of `CatalogModifierOverride` objects that override whether a given `CatalogModifier` is enabled by default.
     */
    #[JsonProperty('modifier_overrides'), ArrayType([CatalogModifierOverride::class])]
    private ?array $modifierOverrides;

    /**
     * If 0 or larger, the smallest number of `CatalogModifier`s that must be selected from this `CatalogModifierList`.
     * The default value is `-1`.
     *
     * When  `CatalogModifierList.selection_type` is `MULTIPLE`, `CatalogModifierListInfo.min_selected_modifiers=-1`
     * and `CatalogModifierListInfo.max_selected_modifier=-1` means that from zero to the maximum number of modifiers of
     * the `CatalogModifierList` can be selected from the `CatalogModifierList`.
     *
     * When the `CatalogModifierList.selection_type` is `SINGLE`, `CatalogModifierListInfo.min_selected_modifiers=-1`
     * and `CatalogModifierListInfo.max_selected_modifier=-1` means that exactly one modifier must be present in
     * and can be selected from the `CatalogModifierList`
     *
     * @var ?int $minSelectedModifiers
     */
    #[JsonProperty('min_selected_modifiers')]
    private ?int $minSelectedModifiers;

    /**
     * If 0 or larger, the largest number of `CatalogModifier`s that can be selected from this `CatalogModifierList`.
     * The default value is `-1`.
     *
     * When  `CatalogModifierList.selection_type` is `MULTIPLE`, `CatalogModifierListInfo.min_selected_modifiers=-1`
     * and `CatalogModifierListInfo.max_selected_modifier=-1` means that from zero to the maximum number of modifiers of
     * the `CatalogModifierList` can be selected from the `CatalogModifierList`.
     *
     * When the `CatalogModifierList.selection_type` is `SINGLE`, `CatalogModifierListInfo.min_selected_modifiers=-1`
     * and `CatalogModifierListInfo.max_selected_modifier=-1` means that exactly one modifier must be present in
     * and can be selected from the `CatalogModifierList`
     *
     * @var ?int $maxSelectedModifiers
     */
    #[JsonProperty('max_selected_modifiers')]
    private ?int $maxSelectedModifiers;

    /**
     * @var ?bool $enabled If `true`, enable this `CatalogModifierList`. The default value is `true`.
     */
    #[JsonProperty('enabled')]
    private ?bool $enabled;

    /**
     * The position of this `CatalogItemModifierListInfo` object within the `modifier_list_info` list applied
     * to a `CatalogItem` instance.
     *
     * @var ?int $ordinal
     */
    #[JsonProperty('ordinal')]
    private ?int $ordinal;

    /**
     * @param array{
     *   modifierListId: string,
     *   modifierOverrides?: ?array<CatalogModifierOverride>,
     *   minSelectedModifiers?: ?int,
     *   maxSelectedModifiers?: ?int,
     *   enabled?: ?bool,
     *   ordinal?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->modifierListId = $values['modifierListId'];
        $this->modifierOverrides = $values['modifierOverrides'] ?? null;
        $this->minSelectedModifiers = $values['minSelectedModifiers'] ?? null;
        $this->maxSelectedModifiers = $values['maxSelectedModifiers'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->ordinal = $values['ordinal'] ?? null;
    }

    /**
     * @return string
     */
    public function getModifierListId(): string
    {
        return $this->modifierListId;
    }

    /**
     * @param string $value
     */
    public function setModifierListId(string $value): self
    {
        $this->modifierListId = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogModifierOverride>
     */
    public function getModifierOverrides(): ?array
    {
        return $this->modifierOverrides;
    }

    /**
     * @param ?array<CatalogModifierOverride> $value
     */
    public function setModifierOverrides(?array $value = null): self
    {
        $this->modifierOverrides = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getMinSelectedModifiers(): ?int
    {
        return $this->minSelectedModifiers;
    }

    /**
     * @param ?int $value
     */
    public function setMinSelectedModifiers(?int $value = null): self
    {
        $this->minSelectedModifiers = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getMaxSelectedModifiers(): ?int
    {
        return $this->maxSelectedModifiers;
    }

    /**
     * @param ?int $value
     */
    public function setMaxSelectedModifiers(?int $value = null): self
    {
        $this->maxSelectedModifiers = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param ?bool $value
     */
    public function setEnabled(?bool $value = null): self
    {
        $this->enabled = $value;
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
