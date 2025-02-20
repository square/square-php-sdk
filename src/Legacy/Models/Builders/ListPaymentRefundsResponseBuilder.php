<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListPaymentRefundsResponse;
use Square\Legacy\Models\PaymentRefund;

/**
 * Builder for model ListPaymentRefundsResponse
 *
 * @see ListPaymentRefundsResponse
 */
class ListPaymentRefundsResponseBuilder
{
    /**
     * @var ListPaymentRefundsResponse
     */
    private $instance;

    private function __construct(ListPaymentRefundsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Payment Refunds Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListPaymentRefundsResponse());
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
     * Sets refunds field.
     *
     * @param PaymentRefund[]|null $value
     */
    public function refunds(?array $value): self
    {
        $this->instance->setRefunds($value);
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
     * Initializes a new List Payment Refunds Response object.
     */
    public function build(): ListPaymentRefundsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
