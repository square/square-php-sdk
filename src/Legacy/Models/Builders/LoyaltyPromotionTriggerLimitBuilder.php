<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\LoyaltyPromotionTriggerLimit;

/**
 * Builder for model LoyaltyPromotionTriggerLimit
 *
 * @see LoyaltyPromotionTriggerLimit
 */
class LoyaltyPromotionTriggerLimitBuilder
{
    /**
     * @var LoyaltyPromotionTriggerLimit
     */
    private $instance;

    private function __construct(LoyaltyPromotionTriggerLimit $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Loyalty Promotion Trigger Limit Builder object.
     *
     * @param int $times
     */
    public static function init(int $times): self
    {
        return new self(new LoyaltyPromotionTriggerLimit($times));
    }

    /**
     * Sets interval field.
     *
     * @param string|null $value
     */
    public function interval(?string $value): self
    {
        $this->instance->setInterval($value);
        return $this;
    }

    /**
     * Initializes a new Loyalty Promotion Trigger Limit object.
     */
    public function build(): LoyaltyPromotionTriggerLimit
    {
        return CoreHelper::clone($this->instance);
    }
}
