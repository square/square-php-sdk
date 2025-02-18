<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\PaymentRefund;
use Square\Legacy\Models\RefundPaymentResponse;

/**
 * Builder for model RefundPaymentResponse
 *
 * @see RefundPaymentResponse
 */
class RefundPaymentResponseBuilder
{
    /**
     * @var RefundPaymentResponse
     */
    private $instance;

    private function __construct(RefundPaymentResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Refund Payment Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RefundPaymentResponse());
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
     * Sets refund field.
     *
     * @param PaymentRefund|null $value
     */
    public function refund(?PaymentRefund $value): self
    {
        $this->instance->setRefund($value);
        return $this;
    }

    /**
     * Initializes a new Refund Payment Response object.
     */
    public function build(): RefundPaymentResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
