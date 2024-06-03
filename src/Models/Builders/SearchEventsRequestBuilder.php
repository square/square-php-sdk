<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\SearchEventsQuery;
use Square\Models\SearchEventsRequest;

/**
 * Builder for model SearchEventsRequest
 *
 * @see SearchEventsRequest
 */
class SearchEventsRequestBuilder
{
    /**
     * @var SearchEventsRequest
     */
    private $instance;

    private function __construct(SearchEventsRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new search events request Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchEventsRequest());
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
     * Sets limit field.
     */
    public function limit(?int $value): self
    {
        $this->instance->setLimit($value);
        return $this;
    }

    /**
     * Sets query field.
     */
    public function query(?SearchEventsQuery $value): self
    {
        $this->instance->setQuery($value);
        return $this;
    }

    /**
     * Initializes a new search events request object.
     */
    public function build(): SearchEventsRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
