<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\PaymentBalanceActivityAutomaticSavingsDetail;

/**
 * Builder for model PaymentBalanceActivityAutomaticSavingsDetail
 *
 * @see PaymentBalanceActivityAutomaticSavingsDetail
 */
class PaymentBalanceActivityAutomaticSavingsDetailBuilder
{
    /**
     * @var PaymentBalanceActivityAutomaticSavingsDetail
     */
    private $instance;

    private function __construct(PaymentBalanceActivityAutomaticSavingsDetail $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Payment Balance Activity Automatic Savings Detail Builder object.
     */
    public static function init(): self
    {
        return new self(new PaymentBalanceActivityAutomaticSavingsDetail());
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
     * Sets payout id field.
     *
     * @param string|null $value
     */
    public function payoutId(?string $value): self
    {
        $this->instance->setPayoutId($value);
        return $this;
    }

    /**
     * Unsets payout id field.
     */
    public function unsetPayoutId(): self
    {
        $this->instance->unsetPayoutId();
        return $this;
    }

    /**
     * Initializes a new Payment Balance Activity Automatic Savings Detail object.
     */
    public function build(): PaymentBalanceActivityAutomaticSavingsDetail
    {
        return CoreHelper::clone($this->instance);
    }
}
