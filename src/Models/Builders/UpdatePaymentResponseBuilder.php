<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\Payment;
use Square\Models\UpdatePaymentResponse;

/**
 * Builder for model UpdatePaymentResponse
 *
 * @see UpdatePaymentResponse
 */
class UpdatePaymentResponseBuilder
{
    /**
     * @var UpdatePaymentResponse
     */
    private $instance;

    private function __construct(UpdatePaymentResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Payment Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdatePaymentResponse());
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
     * Initializes a new Update Payment Response object.
     */
    public function build(): UpdatePaymentResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
