<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\MeasurementUnit;
use Square\Models\StandardUnitDescription;

/**
 * Builder for model StandardUnitDescription
 *
 * @see StandardUnitDescription
 */
class StandardUnitDescriptionBuilder
{
    /**
     * @var StandardUnitDescription
     */
    private $instance;

    private function __construct(StandardUnitDescription $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Standard Unit Description Builder object.
     */
    public static function init(): self
    {
        return new self(new StandardUnitDescription());
    }

    /**
     * Sets unit field.
     *
     * @param MeasurementUnit|null $value
     */
    public function unit(?MeasurementUnit $value): self
    {
        $this->instance->setUnit($value);
        return $this;
    }

    /**
     * Sets name field.
     *
     * @param string|null $value
     */
    public function name(?string $value): self
    {
        $this->instance->setName($value);
        return $this;
    }

    /**
     * Unsets name field.
     */
    public function unsetName(): self
    {
        $this->instance->unsetName();
        return $this;
    }

    /**
     * Sets abbreviation field.
     *
     * @param string|null $value
     */
    public function abbreviation(?string $value): self
    {
        $this->instance->setAbbreviation($value);
        return $this;
    }

    /**
     * Unsets abbreviation field.
     */
    public function unsetAbbreviation(): self
    {
        $this->instance->unsetAbbreviation();
        return $this;
    }

    /**
     * Initializes a new Standard Unit Description object.
     */
    public function build(): StandardUnitDescription
    {
        return CoreHelper::clone($this->instance);
    }
}
