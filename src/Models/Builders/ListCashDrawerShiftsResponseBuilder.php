<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ListCashDrawerShiftsResponse;

/**
 * Builder for model ListCashDrawerShiftsResponse
 *
 * @see ListCashDrawerShiftsResponse
 */
class ListCashDrawerShiftsResponseBuilder
{
    /**
     * @var ListCashDrawerShiftsResponse
     */
    private $instance;

    private function __construct(ListCashDrawerShiftsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new list cash drawer shifts response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListCashDrawerShiftsResponse());
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
     * Sets cash drawer shifts field.
     */
    public function cashDrawerShifts(?array $value): self
    {
        $this->instance->setCashDrawerShifts($value);
        return $this;
    }

    /**
     * Initializes a new list cash drawer shifts response object.
     */
    public function build(): ListCashDrawerShiftsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
