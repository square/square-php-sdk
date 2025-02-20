<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\EnableEventsResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model EnableEventsResponse
 *
 * @see EnableEventsResponse
 */
class EnableEventsResponseBuilder
{
    /**
     * @var EnableEventsResponse
     */
    private $instance;

    private function __construct(EnableEventsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Enable Events Response Builder object.
     */
    public static function init(): self
    {
        return new self(new EnableEventsResponse());
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
     * Initializes a new Enable Events Response object.
     */
    public function build(): EnableEventsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
