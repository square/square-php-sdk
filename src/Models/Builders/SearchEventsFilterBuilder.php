<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\SearchEventsFilter;
use Square\Models\TimeRange;

/**
 * Builder for model SearchEventsFilter
 *
 * @see SearchEventsFilter
 */
class SearchEventsFilterBuilder
{
    /**
     * @var SearchEventsFilter
     */
    private $instance;

    private function __construct(SearchEventsFilter $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new search events filter Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchEventsFilter());
    }

    /**
     * Sets event types field.
     */
    public function eventTypes(?array $value): self
    {
        $this->instance->setEventTypes($value);
        return $this;
    }

    /**
     * Unsets event types field.
     */
    public function unsetEventTypes(): self
    {
        $this->instance->unsetEventTypes();
        return $this;
    }

    /**
     * Sets merchant ids field.
     */
    public function merchantIds(?array $value): self
    {
        $this->instance->setMerchantIds($value);
        return $this;
    }

    /**
     * Unsets merchant ids field.
     */
    public function unsetMerchantIds(): self
    {
        $this->instance->unsetMerchantIds();
        return $this;
    }

    /**
     * Sets location ids field.
     */
    public function locationIds(?array $value): self
    {
        $this->instance->setLocationIds($value);
        return $this;
    }

    /**
     * Unsets location ids field.
     */
    public function unsetLocationIds(): self
    {
        $this->instance->unsetLocationIds();
        return $this;
    }

    /**
     * Sets created at field.
     */
    public function createdAt(?TimeRange $value): self
    {
        $this->instance->setCreatedAt($value);
        return $this;
    }

    /**
     * Initializes a new search events filter object.
     */
    public function build(): SearchEventsFilter
    {
        return CoreHelper::clone($this->instance);
    }
}
