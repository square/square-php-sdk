<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The information needed to define a custom unit, provided by the seller.
 */
class MeasurementUnitCustom extends JsonSerializableType
{
    /**
     * @var string $name The name of the custom unit, for example "bushel".
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * The abbreviation of the custom unit, such as "bsh" (bushel). This appears
     * in the cart for the Point of Sale app, and in reports.
     *
     * @var string $abbreviation
     */
    #[JsonProperty('abbreviation')]
    private string $abbreviation;

    /**
     * @param array{
     *   name: string,
     *   abbreviation: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->abbreviation = $values['abbreviation'];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }

    /**
     * @param string $value
     */
    public function setAbbreviation(string $value): self
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
