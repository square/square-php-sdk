<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\SearchEventsSort;

/**
 * Builder for model SearchEventsSort
 *
 * @see SearchEventsSort
 */
class SearchEventsSortBuilder
{
    /**
     * @var SearchEventsSort
     */
    private $instance;

    private function __construct(SearchEventsSort $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new search events sort Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchEventsSort());
    }

    /**
     * Sets field field.
     */
    public function field(?string $value): self
    {
        $this->instance->setField($value);
        return $this;
    }

    /**
     * Sets order field.
     */
    public function order(?string $value): self
    {
        $this->instance->setOrder($value);
        return $this;
    }

    /**
     * Initializes a new search events sort object.
     */
    public function build(): SearchEventsSort
    {
        return CoreHelper::clone($this->instance);
    }
}
