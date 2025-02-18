<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListLoyaltyPromotionsResponse;
use Square\Legacy\Models\LoyaltyPromotion;

/**
 * Builder for model ListLoyaltyPromotionsResponse
 *
 * @see ListLoyaltyPromotionsResponse
 */
class ListLoyaltyPromotionsResponseBuilder
{
    /**
     * @var ListLoyaltyPromotionsResponse
     */
    private $instance;

    private function __construct(ListLoyaltyPromotionsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Loyalty Promotions Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListLoyaltyPromotionsResponse());
    }

    /**
     * Sets errors field.
     *
     * @param Error[]|null $value
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets loyalty promotions field.
     *
     * @param LoyaltyPromotion[]|null $value
     */
    public function loyaltyPromotions(?array $value): self
    {
        $this->instance->setLoyaltyPromotions($value);
        return $this;
    }

    /**
     * Sets cursor field.
     *
     * @param string|null $value
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
        return $this;
    }

    /**
     * Initializes a new List Loyalty Promotions Response object.
     */
    public function build(): ListLoyaltyPromotionsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
