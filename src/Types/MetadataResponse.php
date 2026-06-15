<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class MetadataResponse extends JsonSerializableType
{
    /**
     * @var ?array<Cube> $cubes
     */
    #[JsonProperty('cubes'), ArrayType([Cube::class])]
    private ?array $cubes;

    /**
     * @var ?string $compilerId
     */
    #[JsonProperty('compilerId')]
    private ?string $compilerId;

    /**
     * @param array{
     *   cubes?: ?array<Cube>,
     *   compilerId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cubes = $values['cubes'] ?? null;
        $this->compilerId = $values['compilerId'] ?? null;
    }

    /**
     * @return ?array<Cube>
     */
    public function getCubes(): ?array
    {
        return $this->cubes;
    }

    /**
     * @param ?array<Cube> $value
     */
    public function setCubes(?array $value = null): self
    {
        $this->cubes = $value;
        $this->_setField('cubes');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCompilerId(): ?string
    {
        return $this->compilerId;
    }

    /**
     * @param ?string $value
     */
    public function setCompilerId(?string $value = null): self
    {
        $this->compilerId = $value;
        $this->_setField('compilerId');
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
