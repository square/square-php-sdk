<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Controls how a modifier list is applied to a specific item. This object allows for item-specific customization of modifier list behavior
 * and provides the ability to override global modifier list settings.
 */
class CatalogItemModifierListInfo extends JsonSerializableType
{
    /**
     * @var string $modifierListId The ID of the `CatalogModifierList` controlled by this `CatalogModifierListInfo`.
     */
    #[JsonProperty('modifier_list_id')]
    private string $modifierListId;

    /**
     * @var ?array<CatalogModifierOverride> $modifierOverrides A set of `CatalogModifierOverride` objects that override default modifier settings for this item.
     */
    #[JsonProperty('modifier_overrides'), ArrayType([CatalogModifierOverride::class])]
    private ?array $modifierOverrides;

    /**
     * The minimum number of modifiers that must be selected from this modifier list.
     * Values:
     *
     * - 0: No selection is required.
     * - -1: Default value, the attribute was not set by the client. When `max_selected_modifiers` is
     * also -1, use the minimum and maximum selection values set on the `CatalogItemModifierList`.
     * - &gt;0: The required minimum modifier selections. This can be larger than the total `CatalogModifiers` when `allow_quantities` is enabled.
     * - &lt; -1: Invalid. Treated as no selection required.
     *
     * @var ?int $minSelectedModifiers
     */
    #[JsonProperty('min_selected_modifiers')]
    private ?int $minSelectedModifiers;

    /**
     * The maximum number of modifiers that can be selected.
     * Values:
     *
     * - 0: No maximum limit.
     * - -1: Default value, the attribute was not set by the client. When `min_selected_modifiers` is
     * also -1, use the minimum and maximum selection values set on the `CatalogItemModifierList`.
     * - &gt;0: The maximum total modifier selections. This can be larger than the total `CatalogModifiers` when `allow_quantities` is enabled.
     * - &lt; -1: Invalid. Treated as no maximum limit.
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
     * Controls whether multiple quantities of the same modifier can be selected for this item.
     * - `YES` means that every modifier in the `CatalogModifierList` can have multiple quantities
     * selected for this item.
     * - `NO` means that each modifier in the `CatalogModifierList` can be selected only once for this item.
     * - `NOT_SET` means that the `allow_quantities` setting on the `CatalogModifierList` is obeyed.
     * See [CatalogModifierToggleOverrideType](#type-catalogmodifiertoggleoverridetype) for possible values
     *
     * @var ?value-of<CatalogModifierToggleOverrideType> $allowQuantities
     */
    #[JsonProperty('allow_quantities')]
    private ?string $allowQuantities;

    /**
     * Controls whether conversational mode is enabled for modifiers on this item.
     *
     * - `YES` means conversational mode is enabled for every modifier in the `CatalogModifierList`.
     * - `NO` means that conversational mode is not enabled for any modifier in the `CatalogModifierList`.
     * - `NOT_SET` means that conversational mode is not enabled for any modifier in the `CatalogModifierList`.
     * See [CatalogModifierToggleOverrideType](#type-catalogmodifiertoggleoverridetype) for possible values
     *
     * @var ?value-of<CatalogModifierToggleOverrideType> $isConversational
     */
    #[JsonProperty('is_conversational')]
    private ?string $isConversational;

    /**
     * Controls whether all modifiers for this item are hidden from customer receipts.
     * - `YES` means that all modifiers in the `CatalogModifierList` are hidden from customer
     * receipts for this item.
     * - `NO` means that all modifiers in the `CatalogModifierList` are visible on customer receipts for this item.
     * - `NOT_SET` means that the `hidden_from_customer` setting on the `CatalogModifierList` is obeyed.
     * See [CatalogModifierToggleOverrideType](#type-catalogmodifiertoggleoverridetype) for possible values
     *
     * @var ?value-of<CatalogModifierToggleOverrideType> $hiddenFromCustomerOverride
     */
    #[JsonProperty('hidden_from_customer_override')]
    private ?string $hiddenFromCustomerOverride;

    /**
     * @param array{
     *   modifierListId: string,
     *   modifierOverrides?: ?array<CatalogModifierOverride>,
     *   minSelectedModifiers?: ?int,
     *   maxSelectedModifiers?: ?int,
     *   enabled?: ?bool,
     *   ordinal?: ?int,
     *   allowQuantities?: ?value-of<CatalogModifierToggleOverrideType>,
     *   isConversational?: ?value-of<CatalogModifierToggleOverrideType>,
     *   hiddenFromCustomerOverride?: ?value-of<CatalogModifierToggleOverrideType>,
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
        $this->allowQuantities = $values['allowQuantities'] ?? null;
        $this->isConversational = $values['isConversational'] ?? null;
        $this->hiddenFromCustomerOverride = $values['hiddenFromCustomerOverride'] ?? null;
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
     * @return ?value-of<CatalogModifierToggleOverrideType>
     */
    public function getAllowQuantities(): ?string
    {
        return $this->allowQuantities;
    }

    /**
     * @param ?value-of<CatalogModifierToggleOverrideType> $value
     */
    public function setAllowQuantities(?string $value = null): self
    {
        $this->allowQuantities = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogModifierToggleOverrideType>
     */
    public function getIsConversational(): ?string
    {
        return $this->isConversational;
    }

    /**
     * @param ?value-of<CatalogModifierToggleOverrideType> $value
     */
    public function setIsConversational(?string $value = null): self
    {
        $this->isConversational = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogModifierToggleOverrideType>
     */
    public function getHiddenFromCustomerOverride(): ?string
    {
        return $this->hiddenFromCustomerOverride;
    }

    /**
     * @param ?value-of<CatalogModifierToggleOverrideType> $value
     */
    public function setHiddenFromCustomerOverride(?string $value = null): self
    {
        $this->hiddenFromCustomerOverride = $value;
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
