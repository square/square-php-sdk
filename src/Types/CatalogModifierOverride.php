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
     * @var mixed $hiddenOnlineOverride
     */
    #[JsonProperty('hidden_online_override')]
    private mixed $hiddenOnlineOverride;

    /**
     * @var mixed $onByDefaultOverride
     */
    #[JsonProperty('on_by_default_override')]
    private mixed $onByDefaultOverride;

    /**
     * @param array{
     *   modifierId: string,
     *   onByDefault?: ?bool,
     *   hiddenOnlineOverride?: mixed,
     *   onByDefaultOverride?: mixed,
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
     * @return mixed
     */
    public function getHiddenOnlineOverride(): mixed
    {
        return $this->hiddenOnlineOverride;
    }

    /**
     * @param mixed $value
     */
    public function setHiddenOnlineOverride(mixed $value = null): self
    {
        $this->hiddenOnlineOverride = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOnByDefaultOverride(): mixed
    {
        return $this->onByDefaultOverride;
    }

    /**
     * @param mixed $value
     */
    public function setOnByDefaultOverride(mixed $value = null): self
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
