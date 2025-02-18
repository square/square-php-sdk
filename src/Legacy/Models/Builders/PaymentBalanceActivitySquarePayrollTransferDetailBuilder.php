<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\PaymentBalanceActivitySquarePayrollTransferDetail;

/**
 * Builder for model PaymentBalanceActivitySquarePayrollTransferDetail
 *
 * @see PaymentBalanceActivitySquarePayrollTransferDetail
 */
class PaymentBalanceActivitySquarePayrollTransferDetailBuilder
{
    /**
     * @var PaymentBalanceActivitySquarePayrollTransferDetail
     */
    private $instance;

    private function __construct(PaymentBalanceActivitySquarePayrollTransferDetail $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Payment Balance Activity Square Payroll Transfer Detail Builder object.
     */
    public static function init(): self
    {
        return new self(new PaymentBalanceActivitySquarePayrollTransferDetail());
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
     * Initializes a new Payment Balance Activity Square Payroll Transfer Detail object.
     */
    public function build(): PaymentBalanceActivitySquarePayrollTransferDetail
    {
        return CoreHelper::clone($this->instance);
    }
}
