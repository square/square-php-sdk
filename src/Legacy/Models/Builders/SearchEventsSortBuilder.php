<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\SearchEventsSort;

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
     * Initializes a new Search Events Sort Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchEventsSort());
    }

    /**
     * Sets field field.
     *
     * @param string|null $value
     */
    public function field(?string $value): self
    {
        $this->instance->setField($value);
        return $this;
    }

    /**
     * Sets order field.
     *
     * @param string|null $value
     */
    public function order(?string $value): self
    {
        $this->instance->setOrder($value);
        return $this;
    }

    /**
     * Initializes a new Search Events Sort object.
     */
    public function build(): SearchEventsSort
    {
        return CoreHelper::clone($this->instance);
    }
}
