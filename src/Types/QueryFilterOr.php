<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class QueryFilterOr extends JsonSerializableType
{
    /**
     * @var array<array<string, mixed>> $or
     */
    #[JsonProperty('or'), ArrayType([['string' => 'mixed']])]
    private array $or;

    /**
     * @param array{
     *   or: array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->or = $values['or'];
    }

    /**
     * @return array<array<string, mixed>>
     */
    public function getOr(): array
    {
        return $this->or;
    }

    /**
     * @param array<array<string, mixed>> $value
     */
    public function setOr(array $value): self
    {
        $this->or = $value;
        $this->_setField('or');
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
