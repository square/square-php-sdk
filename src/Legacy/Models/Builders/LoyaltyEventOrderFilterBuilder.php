<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\LoyaltyEventOrderFilter;

/**
 * Builder for model LoyaltyEventOrderFilter
 *
 * @see LoyaltyEventOrderFilter
 */
class LoyaltyEventOrderFilterBuilder
{
    /**
     * @var LoyaltyEventOrderFilter
     */
    private $instance;

    private function __construct(LoyaltyEventOrderFilter $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Loyalty Event Order Filter Builder object.
     *
     * @param string $orderId
     */
    public static function init(string $orderId): self
    {
        return new self(new LoyaltyEventOrderFilter($orderId));
    }

    /**
     * Initializes a new Loyalty Event Order Filter object.
     */
    public function build(): LoyaltyEventOrderFilter
    {
        return CoreHelper::clone($this->instance);
    }
}
