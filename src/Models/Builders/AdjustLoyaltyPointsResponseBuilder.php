<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\AdjustLoyaltyPointsResponse;
use Square\Models\Error;
use Square\Models\LoyaltyEvent;

/**
 * Builder for model AdjustLoyaltyPointsResponse
 *
 * @see AdjustLoyaltyPointsResponse
 */
class AdjustLoyaltyPointsResponseBuilder
{
    /**
     * @var AdjustLoyaltyPointsResponse
     */
    private $instance;

    private function __construct(AdjustLoyaltyPointsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Adjust Loyalty Points Response Builder object.
     */
    public static function init(): self
    {
        return new self(new AdjustLoyaltyPointsResponse());
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
     * Sets event field.
     *
     * @param LoyaltyEvent|null $value
     */
    public function event(?LoyaltyEvent $value): self
    {
        $this->instance->setEvent($value);
        return $this;
    }

    /**
     * Initializes a new Adjust Loyalty Points Response object.
     */
    public function build(): AdjustLoyaltyPointsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
