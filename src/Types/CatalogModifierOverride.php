<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Options to control how to override the default behavior of the specified modifier.
 */
class CatalogModifierOverride extends JsonSerializableType
{
    /**
     * @var string $modifierId The ID of the `CatalogModifier` whose default behavior is being overridden.
     */
    #[JsonProperty('modifier_id')]
    private string $modifierId;

    /**
     * @var ?bool $onByDefault __Deprecated__: Use `on_by_default_override` instead.
     */
    #[JsonProperty('on_by_default')]
    private ?bool $onByDefault;

    /**
     * If `YES`, this setting overrides the `hidden_online` setting on the `CatalogModifier` object,
     * and the modifier is always hidden from online sales channels.
     * If `NO`, the modifier is not hidden. It is always visible in online sales channels for this catalog item.
     * `NOT_SET` means the `hidden_online` setting on the `CatalogModifier` object is obeyed.
     * See [CatalogModifierToggleOverrideType](#type-catalogmodifiertoggleoverridetype) for possible values
     *
     * @var ?value-of<CatalogModifierToggleOverrideType> $hiddenOnlineOverride
     */
    #[JsonProperty('hidden_online_override')]
    private ?string $hiddenOnlineOverride;

    /**
     * If `YES`, this setting overrides the `on_by_default` setting on the `CatalogModifier` object,
     * and the modifier is always selected by default for the catalog item.
     *
     * If `NO`, the modifier is not selected by default for this catalog item.
     * `NOT_SET` means the `on_by_default` setting on the `CatalogModifier` object is obeyed.
     * See [CatalogModifierToggleOverrideType](#type-catalogmodifiertoggleoverridetype) for possible values
     *
     * @var ?value-of<CatalogModifierToggleOverrideType> $onByDefaultOverride
     */
    #[JsonProperty('on_by_default_override')]
    private ?string $onByDefaultOverride;

    /**
     * @param array{
     *   modifierId: string,
     *   onByDefault?: ?bool,
     *   hiddenOnlineOverride?: ?value-of<CatalogModifierToggleOverrideType>,
     *   onByDefaultOverride?: ?value-of<CatalogModifierToggleOverrideType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->modifierId = $values['modifierId'];
        $this->onByDefault = $values['onByDefault'] ?? null;
        $this->hiddenOnlineOverride = $values['hiddenOnlineOverride'] ?? null;
        $this->onByDefaultOverride = $values['onByDefaultOverride'] ?? null;
    }

    /**
     * @return string
     */
    public function getModifierId(): string
    {
        return $this->modifierId;
    }

    /**
     * @param string $value
     */
    public function setModifierId(string $value): self
    {
        $this->modifierId = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getOnByDefault(): ?bool
    {
        return $this->onByDefault;
    }

    /**
     * @param ?bool $value
     */
    public function setOnByDefault(?bool $value = null): self
    {
        $this->onByDefault = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogModifierToggleOverrideType>
     */
    public function getHiddenOnlineOverride(): ?string
    {
        return $this->hiddenOnlineOverride;
    }

    /**
     * @param ?value-of<CatalogModifierToggleOverrideType> $value
     */
    public function setHiddenOnlineOverride(?string $value = null): self
    {
        $this->hiddenOnlineOverride = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogModifierToggleOverrideType>
     */
    public function getOnByDefaultOverride(): ?string
    {
        return $this->onByDefaultOverride;
    }

    /**
     * @param ?value-of<CatalogModifierToggleOverrideType> $value
     */
    public function setOnByDefaultOverride(?string $value = null): self
    {
        $this->onByDefaultOverride = $value;
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
