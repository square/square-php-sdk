<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\LoyaltyEventLoyaltyAccountFilter;

/**
 * Builder for model LoyaltyEventLoyaltyAccountFilter
 *
 * @see LoyaltyEventLoyaltyAccountFilter
 */
class LoyaltyEventLoyaltyAccountFilterBuilder
{
    /**
     * @var LoyaltyEventLoyaltyAccountFilter
     */
    private $instance;

    private function __construct(LoyaltyEventLoyaltyAccountFilter $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Loyalty Event Loyalty Account Filter Builder object.
     *
     * @param string $loyaltyAccountId
     */
    public static function init(string $loyaltyAccountId): self
    {
        return new self(new LoyaltyEventLoyaltyAccountFilter($loyaltyAccountId));
    }

    /**
     * Initializes a new Loyalty Event Loyalty Account Filter object.
     */
    public function build(): LoyaltyEventLoyaltyAccountFilter
    {
        return CoreHelper::clone($this->instance);
    }
}
