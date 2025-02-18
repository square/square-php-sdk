<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The range of a number value between the specified lower and upper bounds.
 */
class Range extends JsonSerializableType
{
    /**
     * The lower bound of the number range. At least one of `min` or `max` must be specified.
     * If unspecified, the results will have no minimum value.
     *
     * @var ?string $min
     */
    #[JsonProperty('min')]
    private ?string $min;

    /**
     * The upper bound of the number range. At least one of `min` or `max` must be specified.
     * If unspecified, the results will have no maximum value.
     *
     * @var ?string $max
     */
    #[JsonProperty('max')]
    private ?string $max;

    /**
     * @param array{
     *   min?: ?string,
     *   max?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->min = $values['min'] ?? null;
        $this->max = $values['max'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getMin(): ?string
    {
        return $this->min;
    }

    /**
     * @param ?string $value
     */
    public function setMin(?string $value = null): self
    {
        $this->min = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMax(): ?string
    {
        return $this->max;
    }

    /**
     * @param ?string $value
     */
    public function setMax(?string $value = null): self
    {
        $this->max = $value;
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
