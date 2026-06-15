<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class QueryFilterAnd extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $and
     */
    #[JsonProperty('and'), ArrayType([['string' => 'mixed']])]
    private ?array $and;

    /**
     * @param array{
     *   and?: ?array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->and = $values['and'] ?? null;
    }

    /**
     * @return ?array<array<string, mixed>>
     */
    public function getAnd(): ?array
    {
        return $this->and;
    }

    /**
     * @param ?array<array<string, mixed>> $value
     */
    public function setAnd(?array $value = null): self
    {
        $this->and = $value;
        $this->_setField('and');
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
