<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CalculateLoyaltyPointsResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model CalculateLoyaltyPointsResponse
 *
 * @see CalculateLoyaltyPointsResponse
 */
class CalculateLoyaltyPointsResponseBuilder
{
    /**
     * @var CalculateLoyaltyPointsResponse
     */
    private $instance;

    private function __construct(CalculateLoyaltyPointsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Calculate Loyalty Points Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CalculateLoyaltyPointsResponse());
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
     * Sets points field.
     *
     * @param int|null $value
     */
    public function points(?int $value): self
    {
        $this->instance->setPoints($value);
        return $this;
    }

    /**
     * Sets promotion points field.
     *
     * @param int|null $value
     */
    public function promotionPoints(?int $value): self
    {
        $this->instance->setPromotionPoints($value);
        return $this;
    }

    /**
     * Initializes a new Calculate Loyalty Points Response object.
     */
    public function build(): CalculateLoyaltyPointsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
