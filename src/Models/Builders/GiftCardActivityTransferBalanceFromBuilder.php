<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\GiftCardActivityTransferBalanceFrom;
use Square\Models\Money;

/**
 * Builder for model GiftCardActivityTransferBalanceFrom
 *
 * @see GiftCardActivityTransferBalanceFrom
 */
class GiftCardActivityTransferBalanceFromBuilder
{
    /**
     * @var GiftCardActivityTransferBalanceFrom
     */
    private $instance;

    private function __construct(GiftCardActivityTransferBalanceFrom $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Gift Card Activity Transfer Balance From Builder object.
     *
     * @param string $transferToGiftCardId
     * @param Money $amountMoney
     */
    public static function init(string $transferToGiftCardId, Money $amountMoney): self
    {
        return new self(new GiftCardActivityTransferBalanceFrom($transferToGiftCardId, $amountMoney));
    }

    /**
     * Initializes a new Gift Card Activity Transfer Balance From object.
     */
    public function build(): GiftCardActivityTransferBalanceFrom
    {
        return CoreHelper::clone($this->instance);
    }
}
