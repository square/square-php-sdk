<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\PaymentBalanceActivityReleaseAdjustmentDetail;

/**
 * Builder for model PaymentBalanceActivityReleaseAdjustmentDetail
 *
 * @see PaymentBalanceActivityReleaseAdjustmentDetail
 */
class PaymentBalanceActivityReleaseAdjustmentDetailBuilder
{
    /**
     * @var PaymentBalanceActivityReleaseAdjustmentDetail
     */
    private $instance;

    private function __construct(PaymentBalanceActivityReleaseAdjustmentDetail $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Payment Balance Activity Release Adjustment Detail Builder object.
     */
    public static function init(): self
    {
        return new self(new PaymentBalanceActivityReleaseAdjustmentDetail());
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
     * Initializes a new Payment Balance Activity Release Adjustment Detail object.
     */
    public function build(): PaymentBalanceActivityReleaseAdjustmentDetail
    {
        return CoreHelper::clone($this->instance);
    }
}
