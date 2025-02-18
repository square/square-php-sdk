<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreatePaymentResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Payment;

/**
 * Builder for model CreatePaymentResponse
 *
 * @see CreatePaymentResponse
 */
class CreatePaymentResponseBuilder
{
    /**
     * @var CreatePaymentResponse
     */
    private $instance;

    private function __construct(CreatePaymentResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Payment Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreatePaymentResponse());
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
     * Sets payment field.
     *
     * @param Payment|null $value
     */
    public function payment(?Payment $value): self
    {
        $this->instance->setPayment($value);
        return $this;
    }

    /**
     * Initializes a new Create Payment Response object.
     */
    public function build(): CreatePaymentResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
