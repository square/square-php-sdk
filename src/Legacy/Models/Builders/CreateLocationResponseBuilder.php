<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateLocationResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Location;

/**
 * Builder for model CreateLocationResponse
 *
 * @see CreateLocationResponse
 */
class CreateLocationResponseBuilder
{
    /**
     * @var CreateLocationResponse
     */
    private $instance;

    private function __construct(CreateLocationResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Location Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateLocationResponse());
    }

    /**
     * Sets errors field.
     *
     * @param Error[]|null $value
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets location field.
     *
     * @param Location|null $value
     */
    public function location(?Location $value): self
    {
        $this->instance->setLocation($value);
        return $this;
    }

    /**
     * Initializes a new Create Location Response object.
     */
    public function build(): CreateLocationResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
