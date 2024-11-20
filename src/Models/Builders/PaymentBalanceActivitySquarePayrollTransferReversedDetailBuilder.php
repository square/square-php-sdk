<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\PaymentBalanceActivitySquarePayrollTransferReversedDetail;

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
     * Initializes a new payment balance activity square payroll transfer reversed detail Builder object.
     */
    public static function init(): self
    {
        return new self(new PaymentBalanceActivitySquarePayrollTransferReversedDetail());
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
     * Initializes a new payment balance activity square payroll transfer reversed detail object.
     */
    public function build(): PaymentBalanceActivitySquarePayrollTransferReversedDetail
    {
        return CoreHelper::clone($this->instance);
    }
}
