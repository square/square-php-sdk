<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\SearchEventsResponse;

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
     * Initializes a new search events response Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchEventsResponse());
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
     * Sets events field.
     */
    public function events(?array $value): self
    {
        $this->instance->setEvents($value);
        return $this;
    }

    /**
     * Sets metadata field.
     */
    public function metadata(?array $value): self
    {
        $this->instance->setMetadata($value);
        return $this;
    }

    /**
     * Sets cursor field.
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
        return $this;
    }

    /**
     * Initializes a new search events response object.
     */
    public function build(): SearchEventsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
