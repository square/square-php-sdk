<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Availability;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\SearchAvailabilityResponse;

/**
 * Builder for model SearchAvailabilityResponse
 *
 * @see SearchAvailabilityResponse
 */
class SearchAvailabilityResponseBuilder
{
    /**
     * @var SearchAvailabilityResponse
     */
    private $instance;

    private function __construct(SearchAvailabilityResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Availability Response Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchAvailabilityResponse());
    }

    /**
     * Sets availabilities field.
     *
     * @param Availability[]|null $value
     */
    public function availabilities(?array $value): self
    {
        $this->instance->setAvailabilities($value);
        return $this;
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
     * Initializes a new Search Availability Response object.
     */
    public function build(): SearchAvailabilityResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
