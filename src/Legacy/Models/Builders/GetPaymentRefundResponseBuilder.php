<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\GetPaymentRefundResponse;
use Square\Legacy\Models\PaymentRefund;

/**
 * Builder for model GetPaymentRefundResponse
 *
 * @see GetPaymentRefundResponse
 */
class GetPaymentRefundResponseBuilder
{
    /**
     * @var GetPaymentRefundResponse
     */
    private $instance;

    private function __construct(GetPaymentRefundResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Get Payment Refund Response Builder object.
     */
    public static function init(): self
    {
        return new self(new GetPaymentRefundResponse());
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
     * Initializes a new Get Payment Refund Response object.
     */
    public function build(): GetPaymentRefundResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
