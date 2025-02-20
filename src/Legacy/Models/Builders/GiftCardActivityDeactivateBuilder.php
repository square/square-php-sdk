<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\GiftCardActivityDeactivate;

/**
 * Builder for model GiftCardActivityDeactivate
 *
 * @see GiftCardActivityDeactivate
 */
class GiftCardActivityDeactivateBuilder
{
    /**
     * @var GiftCardActivityDeactivate
     */
    private $instance;

    private function __construct(GiftCardActivityDeactivate $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Gift Card Activity Deactivate Builder object.
     *
     * @param string $reason
     */
    public static function init(string $reason): self
    {
        return new self(new GiftCardActivityDeactivate($reason));
    }

    /**
     * Initializes a new Gift Card Activity Deactivate object.
     */
    public function build(): GiftCardActivityDeactivate
    {
        return CoreHelper::clone($this->instance);
    }
}
