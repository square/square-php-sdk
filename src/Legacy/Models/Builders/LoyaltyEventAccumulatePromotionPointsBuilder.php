<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\LoyaltyEventAccumulatePromotionPoints;

/**
 * Builder for model LoyaltyEventAccumulatePromotionPoints
 *
 * @see LoyaltyEventAccumulatePromotionPoints
 */
class LoyaltyEventAccumulatePromotionPointsBuilder
{
    /**
     * @var LoyaltyEventAccumulatePromotionPoints
     */
    private $instance;

    private function __construct(LoyaltyEventAccumulatePromotionPoints $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Loyalty Event Accumulate Promotion Points Builder object.
     *
     * @param int $points
     * @param string $orderId
     */
    public static function init(int $points, string $orderId): self
    {
        return new self(new LoyaltyEventAccumulatePromotionPoints($points, $orderId));
    }

    /**
     * Sets loyalty program id field.
     *
     * @param string|null $value
     */
    public function loyaltyProgramId(?string $value): self
    {
        $this->instance->setLoyaltyProgramId($value);
        return $this;
    }

    /**
     * Sets loyalty promotion id field.
     *
     * @param string|null $value
     */
    public function loyaltyPromotionId(?string $value): self
    {
        $this->instance->setLoyaltyPromotionId($value);
        return $this;
    }

    /**
     * Initializes a new Loyalty Event Accumulate Promotion Points object.
     */
    public function build(): LoyaltyEventAccumulatePromotionPoints
    {
        return CoreHelper::clone($this->instance);
    }
}
