<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ListCashDrawerShiftEventsResponse;

/**
 * Builder for model ListCashDrawerShiftEventsResponse
 *
 * @see ListCashDrawerShiftEventsResponse
 */
class ListCashDrawerShiftEventsResponseBuilder
{
    /**
     * @var ListCashDrawerShiftEventsResponse
     */
    private $instance;

    private function __construct(ListCashDrawerShiftEventsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new list cash drawer shift events response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListCashDrawerShiftEventsResponse());
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
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets cash drawer shift events field.
     */
    public function cashDrawerShiftEvents(?array $value): self
    {
        $this->instance->setCashDrawerShiftEvents($value);
        return $this;
    }

    /**
     * Initializes a new list cash drawer shift events response object.
     */
    public function build(): ListCashDrawerShiftEventsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
