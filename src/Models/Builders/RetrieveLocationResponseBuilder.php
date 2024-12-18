<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\Location;
use Square\Models\RetrieveLocationResponse;

/**
 * Builder for model RetrieveLocationResponse
 *
 * @see RetrieveLocationResponse
 */
class RetrieveLocationResponseBuilder
{
    /**
     * @var RetrieveLocationResponse
     */
    private $instance;

    private function __construct(RetrieveLocationResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Location Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveLocationResponse());
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
     * Initializes a new Retrieve Location Response object.
     */
    public function build(): RetrieveLocationResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
