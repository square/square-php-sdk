<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ListEventTypesRequest;

/**
 * Builder for model ListEventTypesRequest
 *
 * @see ListEventTypesRequest
 */
class ListEventTypesRequestBuilder
{
    /**
     * @var ListEventTypesRequest
     */
    private $instance;

    private function __construct(ListEventTypesRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new list event types request Builder object.
     */
    public static function init(): self
    {
        return new self(new ListEventTypesRequest());
    }

    /**
     * Sets api version field.
     */
    public function apiVersion(?string $value): self
    {
        $this->instance->setApiVersion($value);
        return $this;
    }

    /**
     * Unsets api version field.
     */
    public function unsetApiVersion(): self
    {
        $this->instance->unsetApiVersion();
        return $this;
    }

    /**
     * Initializes a new list event types request object.
     */
    public function build(): ListEventTypesRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
