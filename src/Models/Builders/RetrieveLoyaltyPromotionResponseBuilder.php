<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\LoyaltyPromotion;
use Square\Models\RetrieveLoyaltyPromotionResponse;

/**
 * Builder for model RetrieveLoyaltyPromotionResponse
 *
 * @see RetrieveLoyaltyPromotionResponse
 */
class RetrieveLoyaltyPromotionResponseBuilder
{
    /**
     * @var RetrieveLoyaltyPromotionResponse
     */
    private $instance;

    private function __construct(RetrieveLoyaltyPromotionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Loyalty Promotion Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveLoyaltyPromotionResponse());
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
     * Initializes a new Retrieve Loyalty Promotion Response object.
     */
    public function build(): RetrieveLoyaltyPromotionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
