<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateLocationRequest;
use Square\Legacy\Models\Location;

/**
 * Builder for model CreateLocationRequest
 *
 * @see CreateLocationRequest
 */
class CreateLocationRequestBuilder
{
    /**
     * @var CreateLocationRequest
     */
    private $instance;

    private function __construct(CreateLocationRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Location Request Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateLocationRequest());
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
     * Initializes a new Create Location Request object.
     */
    public function build(): CreateLocationRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
