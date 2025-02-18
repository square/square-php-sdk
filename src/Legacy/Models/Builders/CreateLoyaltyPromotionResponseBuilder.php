<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateLoyaltyPromotionResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\LoyaltyPromotion;

/**
 * Builder for model CreateLoyaltyPromotionResponse
 *
 * @see CreateLoyaltyPromotionResponse
 */
class CreateLoyaltyPromotionResponseBuilder
{
    /**
     * @var CreateLoyaltyPromotionResponse
     */
    private $instance;

    private function __construct(CreateLoyaltyPromotionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Loyalty Promotion Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateLoyaltyPromotionResponse());
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
     * Sets loyalty promotion field.
     *
     * @param LoyaltyPromotion|null $value
     */
    public function loyaltyPromotion(?LoyaltyPromotion $value): self
    {
        $this->instance->setLoyaltyPromotion($value);
        return $this;
    }

    /**
     * Initializes a new Create Loyalty Promotion Response object.
     */
    public function build(): CreateLoyaltyPromotionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
