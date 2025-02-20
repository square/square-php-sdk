<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\GiftCardActivityAdjustDecrement;
use Square\Legacy\Models\Money;

/**
 * Builder for model GiftCardActivityAdjustDecrement
 *
 * @see GiftCardActivityAdjustDecrement
 */
class GiftCardActivityAdjustDecrementBuilder
{
    /**
     * @var GiftCardActivityAdjustDecrement
     */
    private $instance;

    private function __construct(GiftCardActivityAdjustDecrement $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Gift Card Activity Adjust Decrement Builder object.
     *
     * @param Money $amountMoney
     * @param string $reason
     */
    public static function init(Money $amountMoney, string $reason): self
    {
        return new self(new GiftCardActivityAdjustDecrement($amountMoney, $reason));
    }

    /**
     * Initializes a new Gift Card Activity Adjust Decrement object.
     */
    public function build(): GiftCardActivityAdjustDecrement
    {
        return CoreHelper::clone($this->instance);
    }
}
