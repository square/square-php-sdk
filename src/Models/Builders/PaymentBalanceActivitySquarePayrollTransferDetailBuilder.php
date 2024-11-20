<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\PaymentBalanceActivitySquarePayrollTransferDetail;

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
     * Initializes a new payment balance activity square payroll transfer detail Builder object.
     */
    public static function init(): self
    {
        return new self(new PaymentBalanceActivitySquarePayrollTransferDetail());
    }

    /**
     * Sets payment id field.
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
     * Initializes a new payment balance activity square payroll transfer detail object.
     */
    public function build(): PaymentBalanceActivitySquarePayrollTransferDetail
    {
        return CoreHelper::clone($this->instance);
    }
}
