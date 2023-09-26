<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\V1Device;

/**
 * Builder for model V1Device
 *
 * @see V1Device
 */
class V1DeviceBuilder
{
    /**
     * @var V1Device
     */
    private $instance;

    private function __construct(V1Device $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new v1 device Builder object.
     */
    public static function init(): self
    {
        return new self(new V1Device());
    }

    /**
     * Sets id field.
     */
    public function id(?string $value): self
    {
        $this->instance->setId($value);
        return $this;
    }

    /**
     * Sets name field.
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
     * Initializes a new v1 device object.
     */
    public function build(): V1Device
    {
        return CoreHelper::clone($this->instance);
    }
}
