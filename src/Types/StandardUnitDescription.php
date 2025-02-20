<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Contains the name and abbreviation for standard measurement unit.
 */
class StandardUnitDescription extends JsonSerializableType
{
    /**
     * @var ?MeasurementUnit $unit Identifies the measurement unit being described.
     */
    #[JsonProperty('unit')]
    private ?MeasurementUnit $unit;

    /**
     * @var ?string $name UI display name of the measurement unit. For example, 'Pound'.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $abbreviation UI display abbreviation for the measurement unit. For example, 'lb'.
     */
    #[JsonProperty('abbreviation')]
    private ?string $abbreviation;

    /**
     * @param array{
     *   unit?: ?MeasurementUnit,
     *   name?: ?string,
     *   abbreviation?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->unit = $values['unit'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->abbreviation = $values['abbreviation'] ?? null;
    }

    /**
     * @return ?MeasurementUnit
     */
    public function getUnit(): ?MeasurementUnit
    {
        return $this->unit;
    }

    /**
     * @param ?MeasurementUnit $value
     */
    public function setUnit(?MeasurementUnit $value = null): self
    {
        $this->unit = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    /**
     * @param ?string $value
     */
    public function setAbbreviation(?string $value = null): self
    {
        $this->abbreviation = $value;
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
