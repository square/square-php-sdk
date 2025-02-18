<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\GiftCardActivityAdjustIncrement;
use Square\Legacy\Models\Money;

/**
 * Builder for model GiftCardActivityAdjustIncrement
 *
 * @see GiftCardActivityAdjustIncrement
 */
class GiftCardActivityAdjustIncrementBuilder
{
    /**
     * @var GiftCardActivityAdjustIncrement
     */
    private $instance;

    private function __construct(GiftCardActivityAdjustIncrement $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Gift Card Activity Adjust Increment Builder object.
     *
     * @param Money $amountMoney
     * @param string $reason
     */
    public static function init(Money $amountMoney, string $reason): self
    {
        return new self(new GiftCardActivityAdjustIncrement($amountMoney, $reason));
    }

    /**
     * Initializes a new Gift Card Activity Adjust Increment object.
     */
    public function build(): GiftCardActivityAdjustIncrement
    {
        return CoreHelper::clone($this->instance);
    }
}
