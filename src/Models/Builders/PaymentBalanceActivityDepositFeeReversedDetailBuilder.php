<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\PaymentBalanceActivityDepositFeeReversedDetail;

/**
 * Builder for model PaymentBalanceActivityDepositFeeReversedDetail
 *
 * @see PaymentBalanceActivityDepositFeeReversedDetail
 */
class PaymentBalanceActivityDepositFeeReversedDetailBuilder
{
    /**
     * @var PaymentBalanceActivityDepositFeeReversedDetail
     */
    private $instance;

    private function __construct(PaymentBalanceActivityDepositFeeReversedDetail $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new payment balance activity deposit fee reversed detail Builder object.
     */
    public static function init(): self
    {
        return new self(new PaymentBalanceActivityDepositFeeReversedDetail());
    }

    /**
     * Sets payout id field.
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
     * Initializes a new payment balance activity deposit fee reversed detail object.
     */
    public function build(): PaymentBalanceActivityDepositFeeReversedDetail
    {
        return CoreHelper::clone($this->instance);
    }
}
