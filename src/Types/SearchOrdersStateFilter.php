<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Filter by the current order `state`.
 */
class SearchOrdersStateFilter extends JsonSerializableType
{
    /**
     * States to filter for.
     * See [OrderState](#type-orderstate) for possible values
     *
     * @var array<value-of<OrderState>> $states
     */
    #[JsonProperty('states'), ArrayType(['string'])]
    private array $states;

    /**
     * @param array{
     *   states: array<value-of<OrderState>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->states = $values['states'];
    }

    /**
     * @return array<value-of<OrderState>>
     */
    public function getStates(): array
    {
        return $this->states;
    }

    /**
     * @param array<value-of<OrderState>> $value
     */
    public function setStates(array $value): self
    {
        $this->states = $value;
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
