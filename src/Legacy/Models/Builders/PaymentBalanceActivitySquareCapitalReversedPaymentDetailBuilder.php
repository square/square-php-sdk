<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\PaymentBalanceActivitySquareCapitalReversedPaymentDetail;

/**
 * Builder for model PaymentBalanceActivitySquareCapitalReversedPaymentDetail
 *
 * @see PaymentBalanceActivitySquareCapitalReversedPaymentDetail
 */
class PaymentBalanceActivitySquareCapitalReversedPaymentDetailBuilder
{
    /**
     * @var PaymentBalanceActivitySquareCapitalReversedPaymentDetail
     */
    private $instance;

    private function __construct(PaymentBalanceActivitySquareCapitalReversedPaymentDetail $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Payment Balance Activity Square Capital Reversed Payment Detail Builder object.
     */
    public static function init(): self
    {
        return new self(new PaymentBalanceActivitySquareCapitalReversedPaymentDetail());
    }

    /**
     * Sets payment id field.
     *
     * @param string|null $value
     */
    public function paymentId(?string $value): self
    {
        $this->instance->setPaymentId($value);
        return $this;
    }

    /**
     * Unsets payment id field.
     */
    public function unsetPaymentId(): self
    {
        $this->instance->unsetPaymentId();
        return $this;
    }

    /**
     * Initializes a new Payment Balance Activity Square Capital Reversed Payment Detail object.
     */
    public function build(): PaymentBalanceActivitySquareCapitalReversedPaymentDetail
    {
        return CoreHelper::clone($this->instance);
    }
}
