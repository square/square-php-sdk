<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class LoadResultAnnotation extends JsonSerializableType
{
    /**
     * @var array<string, mixed> $measures
     */
    #[JsonProperty('measures'), ArrayType(['string' => 'mixed'])]
    private array $measures;

    /**
     * @var array<string, mixed> $dimensions
     */
    #[JsonProperty('dimensions'), ArrayType(['string' => 'mixed'])]
    private array $dimensions;

    /**
     * @var array<string, mixed> $segments
     */
    #[JsonProperty('segments'), ArrayType(['string' => 'mixed'])]
    private array $segments;

    /**
     * @var array<string, mixed> $timeDimensions
     */
    #[JsonProperty('timeDimensions'), ArrayType(['string' => 'mixed'])]
    private array $timeDimensions;

    /**
     * @param array{
     *   measures: array<string, mixed>,
     *   dimensions: array<string, mixed>,
     *   segments: array<string, mixed>,
     *   timeDimensions: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->measures = $values['measures'];
        $this->dimensions = $values['dimensions'];
        $this->segments = $values['segments'];
        $this->timeDimensions = $values['timeDimensions'];
    }

    /**
     * @return array<string, mixed>
     */
    public function getMeasures(): array
    {
        return $this->measures;
    }

    /**
     * @param array<string, mixed> $value
     */
    public function setMeasures(array $value): self
    {
        $this->measures = $value;
        $this->_setField('measures');
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getDimensions(): array
    {
        return $this->dimensions;
    }

    /**
     * @param array<string, mixed> $value
     */
    public function setDimensions(array $value): self
    {
        $this->dimensions = $value;
        $this->_setField('dimensions');
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getSegments(): array
    {
        return $this->segments;
    }

    /**
     * @param array<string, mixed> $value
     */
    public function setSegments(array $value): self
    {
        $this->segments = $value;
        $this->_setField('segments');
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getTimeDimensions(): array
    {
        return $this->timeDimensions;
    }

    /**
     * @param array<string, mixed> $value
     */
    public function setTimeDimensions(array $value): self
    {
        $this->timeDimensions = $value;
        $this->_setField('timeDimensions');
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
