<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\GiftCardActivityImport;
use Square\Models\Money;

/**
 * Builder for model GiftCardActivityImport
 *
 * @see GiftCardActivityImport
 */
class GiftCardActivityImportBuilder
{
    /**
     * @var GiftCardActivityImport
     */
    private $instance;

    private function __construct(GiftCardActivityImport $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Gift Card Activity Import Builder object.
     *
     * @param Money $amountMoney
     */
    public static function init(Money $amountMoney): self
    {
        return new self(new GiftCardActivityImport($amountMoney));
    }

    /**
     * Initializes a new Gift Card Activity Import object.
     */
    public function build(): GiftCardActivityImport
    {
        return CoreHelper::clone($this->instance);
    }
}
