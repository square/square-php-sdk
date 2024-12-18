<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\Location;
use Square\Models\UpdateLocationResponse;

/**
 * Builder for model UpdateLocationResponse
 *
 * @see UpdateLocationResponse
 */
class UpdateLocationResponseBuilder
{
    /**
     * @var UpdateLocationResponse
     */
    private $instance;

    private function __construct(UpdateLocationResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Location Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateLocationResponse());
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
     * Initializes a new Update Location Response object.
     */
    public function build(): UpdateLocationResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
