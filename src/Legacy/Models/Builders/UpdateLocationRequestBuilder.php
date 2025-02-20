<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Location;
use Square\Legacy\Models\UpdateLocationRequest;

/**
 * Builder for model UpdateLocationRequest
 *
 * @see UpdateLocationRequest
 */
class UpdateLocationRequestBuilder
{
    /**
     * @var UpdateLocationRequest
     */
    private $instance;

    private function __construct(UpdateLocationRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Location Request Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateLocationRequest());
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
     * Initializes a new Update Location Request object.
     */
    public function build(): UpdateLocationRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
