<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\PaymentBalanceActivityAppFeeRefundDetail;

/**
 * Builder for model PaymentBalanceActivityAppFeeRefundDetail
 *
 * @see PaymentBalanceActivityAppFeeRefundDetail
 */
class PaymentBalanceActivityAppFeeRefundDetailBuilder
{
    /**
     * @var PaymentBalanceActivityAppFeeRefundDetail
     */
    private $instance;

    private function __construct(PaymentBalanceActivityAppFeeRefundDetail $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Payment Balance Activity App Fee Refund Detail Builder object.
     */
    public static function init(): self
    {
        return new self(new PaymentBalanceActivityAppFeeRefundDetail());
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
     * Sets refund id field.
     *
     * @param string|null $value
     */
    public function refundId(?string $value): self
    {
        $this->instance->setRefundId($value);
        return $this;
    }

    /**
     * Unsets refund id field.
     */
    public function unsetRefundId(): self
    {
        $this->instance->unsetRefundId();
        return $this;
    }

    /**
     * Sets location id field.
     *
     * @param string|null $value
     */
    public function locationId(?string $value): self
    {
        $this->instance->setLocationId($value);
        return $this;
    }

    /**
     * Unsets location id field.
     */
    public function unsetLocationId(): self
    {
        $this->instance->unsetLocationId();
        return $this;
    }

    /**
     * Initializes a new Payment Balance Activity App Fee Refund Detail object.
     */
    public function build(): PaymentBalanceActivityAppFeeRefundDetail
    {
        return CoreHelper::clone($this->instance);
    }
}
