<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\LoyaltyEventExpirePoints;

/**
 * Builder for model LoyaltyEventExpirePoints
 *
 * @see LoyaltyEventExpirePoints
 */
class LoyaltyEventExpirePointsBuilder
{
    /**
     * @var LoyaltyEventExpirePoints
     */
    private $instance;

    private function __construct(LoyaltyEventExpirePoints $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Loyalty Event Expire Points Builder object.
     *
     * @param string $loyaltyProgramId
     * @param int $points
     */
    public static function init(string $loyaltyProgramId, int $points): self
    {
        return new self(new LoyaltyEventExpirePoints($loyaltyProgramId, $points));
    }

    /**
     * Initializes a new Loyalty Event Expire Points object.
     */
    public function build(): LoyaltyEventExpirePoints
    {
        return CoreHelper::clone($this->instance);
    }
}
