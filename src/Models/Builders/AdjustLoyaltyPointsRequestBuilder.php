<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\AdjustLoyaltyPointsRequest;
use Square\Models\LoyaltyEventAdjustPoints;

/**
 * Builder for model AdjustLoyaltyPointsRequest
 *
 * @see AdjustLoyaltyPointsRequest
 */
class AdjustLoyaltyPointsRequestBuilder
{
    /**
     * @var AdjustLoyaltyPointsRequest
     */
    private $instance;

    private function __construct(AdjustLoyaltyPointsRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Adjust Loyalty Points Request Builder object.
     *
     * @param string $idempotencyKey
     * @param LoyaltyEventAdjustPoints $adjustPoints
     */
    public static function init(string $idempotencyKey, LoyaltyEventAdjustPoints $adjustPoints): self
    {
        return new self(new AdjustLoyaltyPointsRequest($idempotencyKey, $adjustPoints));
    }

    /**
     * Sets allow negative balance field.
     *
     * @param bool|null $value
     */
    public function allowNegativeBalance(?bool $value): self
    {
        $this->instance->setAllowNegativeBalance($value);
        return $this;
    }

    /**
     * Unsets allow negative balance field.
     */
    public function unsetAllowNegativeBalance(): self
    {
        $this->instance->unsetAllowNegativeBalance();
        return $this;
    }

    /**
     * Initializes a new Adjust Loyalty Points Request object.
     */
    public function build(): AdjustLoyaltyPointsRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
