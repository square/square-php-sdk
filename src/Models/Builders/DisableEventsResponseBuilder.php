<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DisableEventsResponse;

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
     * Initializes a new disable events response Builder object.
     */
    public static function init(): self
    {
        return new self(new DisableEventsResponse());
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new disable events response object.
     */
    public function build(): DisableEventsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
