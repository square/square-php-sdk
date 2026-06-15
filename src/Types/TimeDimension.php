<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class TimeDimension extends JsonSerializableType
{
    /**
     * @var string $dimension
     */
    #[JsonProperty('dimension')]
    private string $dimension;

    /**
     * @var ?string $granularity
     */
    #[JsonProperty('granularity')]
    private ?string $granularity;

    /**
     * @var ?array<string, mixed> $dateRange
     */
    #[JsonProperty('dateRange'), ArrayType(['string' => 'mixed'])]
    private ?array $dateRange;

    /**
     * @param array{
     *   dimension: string,
     *   granularity?: ?string,
     *   dateRange?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dimension = $values['dimension'];
        $this->granularity = $values['granularity'] ?? null;
        $this->dateRange = $values['dateRange'] ?? null;
    }

    /**
     * @return string
     */
    public function getDimension(): string
    {
        return $this->dimension;
    }

    /**
     * @param string $value
     */
    public function setDimension(string $value): self
    {
        $this->dimension = $value;
        $this->_setField('dimension');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getGranularity(): ?string
    {
        return $this->granularity;
    }

    /**
     * @param ?string $value
     */
    public function setGranularity(?string $value = null): self
    {
        $this->granularity = $value;
        $this->_setField('granularity');
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getDateRange(): ?array
    {
        return $this->dateRange;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setDateRange(?array $value = null): self
    {
        $this->dateRange = $value;
        $this->_setField('dateRange');
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
