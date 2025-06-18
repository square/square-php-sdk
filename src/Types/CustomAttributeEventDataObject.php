<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CustomAttributeEventDataObject extends JsonSerializableType
{
    /**
     * @var ?CustomAttribute $customAttribute The custom attribute.
     */
    #[JsonProperty('custom_attribute')]
    private ?CustomAttribute $customAttribute;

    /**
     * @param array{
     *   customAttribute?: ?CustomAttribute,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customAttribute = $values['customAttribute'] ?? null;
    }

    /**
     * @return ?CustomAttribute
     */
    public function getCustomAttribute(): ?CustomAttribute
    {
        return $this->customAttribute;
    }

    /**
     * @param ?CustomAttribute $value
     */
    public function setCustomAttribute(?CustomAttribute $value = null): self
    {
        $this->customAttribute = $value;
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
