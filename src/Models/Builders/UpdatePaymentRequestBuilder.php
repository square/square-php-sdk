<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Payment;
use Square\Models\UpdatePaymentRequest;

/**
 * Builder for model UpdatePaymentRequest
 *
 * @see UpdatePaymentRequest
 */
class UpdatePaymentRequestBuilder
{
    /**
     * @var UpdatePaymentRequest
     */
    private $instance;

    private function __construct(UpdatePaymentRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Payment Request Builder object.
     *
     * @param string $idempotencyKey
     */
    public static function init(string $idempotencyKey): self
    {
        return new self(new UpdatePaymentRequest($idempotencyKey));
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
     * Initializes a new Update Payment Request object.
     */
    public function build(): UpdatePaymentRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
