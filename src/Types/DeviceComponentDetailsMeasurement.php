<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A value qualified by unit of measure.
 */
class DeviceComponentDetailsMeasurement extends JsonSerializableType
{
    /**
     * @var ?int $value
     */
    #[JsonProperty('value')]
    private ?int $value;

    /**
     * @param array{
     *   value?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * @param ?int $value
     */
    public function setValue(?int $value = null): self
    {
        $this->value = $value;
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
