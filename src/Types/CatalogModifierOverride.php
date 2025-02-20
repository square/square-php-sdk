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
     * @var ?bool $onByDefault If `true`, this `CatalogModifier` should be selected by default for this `CatalogItem`.
     */
    #[JsonProperty('on_by_default')]
    private ?bool $onByDefault;

    /**
     * @param array{
     *   modifierId: string,
     *   onByDefault?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->modifierId = $values['modifierId'];
        $this->onByDefault = $values['onByDefault'] ?? null;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
