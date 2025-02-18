<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\LoyaltyAccountExpiringPointDeadline;

/**
 * Builder for model LoyaltyAccountExpiringPointDeadline
 *
 * @see LoyaltyAccountExpiringPointDeadline
 */
class LoyaltyAccountExpiringPointDeadlineBuilder
{
    /**
     * @var LoyaltyAccountExpiringPointDeadline
     */
    private $instance;

    private function __construct(LoyaltyAccountExpiringPointDeadline $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Loyalty Account Expiring Point Deadline Builder object.
     *
     * @param int $points
     * @param string $expiresAt
     */
    public static function init(int $points, string $expiresAt): self
    {
        return new self(new LoyaltyAccountExpiringPointDeadline($points, $expiresAt));
    }

    /**
     * Initializes a new Loyalty Account Expiring Point Deadline object.
     */
    public function build(): LoyaltyAccountExpiringPointDeadline
    {
        return CoreHelper::clone($this->instance);
    }
}
