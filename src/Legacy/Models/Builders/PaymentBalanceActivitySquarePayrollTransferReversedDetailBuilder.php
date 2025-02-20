<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\PaymentBalanceActivitySquarePayrollTransferReversedDetail;

/**
 * Builder for model PaymentBalanceActivitySquarePayrollTransferReversedDetail
 *
 * @see PaymentBalanceActivitySquarePayrollTransferReversedDetail
 */
class PaymentBalanceActivitySquarePayrollTransferReversedDetailBuilder
{
    /**
     * @var PaymentBalanceActivitySquarePayrollTransferReversedDetail
     */
    private $instance;

    private function __construct(PaymentBalanceActivitySquarePayrollTransferReversedDetail $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Payment Balance Activity Square Payroll Transfer Reversed Detail Builder object.
     */
    public static function init(): self
    {
        return new self(new PaymentBalanceActivitySquarePayrollTransferReversedDetail());
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
     * Initializes a new Payment Balance Activity Square Payroll Transfer Reversed Detail object.
     */
    public function build(): PaymentBalanceActivitySquarePayrollTransferReversedDetail
    {
        return CoreHelper::clone($this->instance);
    }
}
