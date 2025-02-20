<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DisableEventsResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model DisableEventsResponse
 *
 * @see DisableEventsResponse
 */
class DisableEventsResponseBuilder
{
    /**
     * @var DisableEventsResponse
     */
    private $instance;

    private function __construct(DisableEventsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Disable Events Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DisableEventsResponse());
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
     * Initializes a new Disable Events Response object.
     */
    public function build(): DisableEventsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
