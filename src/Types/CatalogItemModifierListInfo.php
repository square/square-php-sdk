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
     * @var mixed $allowQuantities
     */
    #[JsonProperty('allow_quantities')]
    private mixed $allowQuantities;

    /**
     * @var mixed $isConversational
     */
    #[JsonProperty('is_conversational')]
    private mixed $isConversational;

    /**
     * @var mixed $hiddenFromCustomerOverride
     */
    #[JsonProperty('hidden_from_customer_override')]
    private mixed $hiddenFromCustomerOverride;

    /**
     * @param array{
     *   modifierListId: string,
     *   modifierOverrides?: ?array<CatalogModifierOverride>,
     *   minSelectedModifiers?: ?int,
     *   maxSelectedModifiers?: ?int,
     *   enabled?: ?bool,
     *   ordinal?: ?int,
     *   allowQuantities?: mixed,
     *   isConversational?: mixed,
     *   hiddenFromCustomerOverride?: mixed,
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
     * @return mixed
     */
    public function getAllowQuantities(): mixed
    {
        return $this->allowQuantities;
    }

    /**
     * @param mixed $value
     */
    public function setAllowQuantities(mixed $value = null): self
    {
        $this->allowQuantities = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsConversational(): mixed
    {
        return $this->isConversational;
    }

    /**
     * @param mixed $value
     */
    public function setIsConversational(mixed $value = null): self
    {
        $this->isConversational = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHiddenFromCustomerOverride(): mixed
    {
        return $this->hiddenFromCustomerOverride;
    }

    /**
     * @param mixed $value
     */
    public function setHiddenFromCustomerOverride(mixed $value = null): self
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
