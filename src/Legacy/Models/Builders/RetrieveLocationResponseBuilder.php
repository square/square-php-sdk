<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Location;
use Square\Legacy\Models\RetrieveLocationResponse;

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
