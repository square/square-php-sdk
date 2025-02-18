<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CashDrawerShiftSummary;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListCashDrawerShiftsResponse;

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
     * Initializes a new List Cash Drawer Shifts Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListCashDrawerShiftsResponse());
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
     * Sets cash drawer shifts field.
     *
     * @param CashDrawerShiftSummary[]|null $value
     */
    public function cashDrawerShifts(?array $value): self
    {
        $this->instance->setCashDrawerShifts($value);
        return $this;
    }

    /**
     * Initializes a new List Cash Drawer Shifts Response object.
     */
    public function build(): ListCashDrawerShiftsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
