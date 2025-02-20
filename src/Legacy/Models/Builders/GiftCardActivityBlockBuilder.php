<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\GiftCardActivityBlock;

/**
 * Builder for model GiftCardActivityBlock
 *
 * @see GiftCardActivityBlock
 */
class GiftCardActivityBlockBuilder
{
    /**
     * @var GiftCardActivityBlock
     */
    private $instance;

    private function __construct(GiftCardActivityBlock $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Gift Card Activity Block Builder object.
     */
    public static function init(): self
    {
        return new self(new GiftCardActivityBlock());
    }

    /**
     * Initializes a new Gift Card Activity Block object.
     */
    public function build(): GiftCardActivityBlock
    {
        return CoreHelper::clone($this->instance);
    }
}
