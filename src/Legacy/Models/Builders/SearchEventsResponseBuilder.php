<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Event;
use Square\Legacy\Models\EventMetadata;
use Square\Legacy\Models\SearchEventsResponse;

/**
 * Builder for model SearchEventsResponse
 *
 * @see SearchEventsResponse
 */
class SearchEventsResponseBuilder
{
    /**
     * @var SearchEventsResponse
     */
    private $instance;

    private function __construct(SearchEventsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Events Response Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchEventsResponse());
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
     * Sets events field.
     *
     * @param Event[]|null $value
     */
    public function events(?array $value): self
    {
        $this->instance->setEvents($value);
        return $this;
    }

    /**
     * Sets metadata field.
     *
     * @param EventMetadata[]|null $value
     */
    public function metadata(?array $value): self
    {
        $this->instance->setMetadata($value);
        return $this;
    }

    /**
     * Sets cursor field.
     *
     * @param string|null $value
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
        return $this;
    }

    /**
     * Initializes a new Search Events Response object.
     */
    public function build(): SearchEventsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
