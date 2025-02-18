<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListPaymentsResponse;
use Square\Legacy\Models\Payment;

/**
 * Builder for model ListPaymentsResponse
 *
 * @see ListPaymentsResponse
 */
class ListPaymentsResponseBuilder
{
    /**
     * @var ListPaymentsResponse
     */
    private $instance;

    private function __construct(ListPaymentsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Payments Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListPaymentsResponse());
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
     * Sets payments field.
     *
     * @param Payment[]|null $value
     */
    public function payments(?array $value): self
    {
        $this->instance->setPayments($value);
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
     * Initializes a new List Payments Response object.
     */
    public function build(): ListPaymentsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
