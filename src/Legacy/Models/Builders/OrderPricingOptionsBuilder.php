<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\OrderPricingOptions;

/**
 * Builder for model OrderPricingOptions
 *
 * @see OrderPricingOptions
 */
class OrderPricingOptionsBuilder
{
    /**
     * @var OrderPricingOptions
     */
    private $instance;

    private function __construct(OrderPricingOptions $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Order Pricing Options Builder object.
     */
    public static function init(): self
    {
        return new self(new OrderPricingOptions());
    }

    /**
     * Sets auto apply discounts field.
     *
     * @param bool|null $value
     */
    public function autoApplyDiscounts(?bool $value): self
    {
        $this->instance->setAutoApplyDiscounts($value);
        return $this;
    }

    /**
     * Unsets auto apply discounts field.
     */
    public function unsetAutoApplyDiscounts(): self
    {
        $this->instance->unsetAutoApplyDiscounts();
        return $this;
    }

    /**
     * Sets auto apply taxes field.
     *
     * @param bool|null $value
     */
    public function autoApplyTaxes(?bool $value): self
    {
        $this->instance->setAutoApplyTaxes($value);
        return $this;
    }

    /**
     * Unsets auto apply taxes field.
     */
    public function unsetAutoApplyTaxes(): self
    {
        $this->instance->unsetAutoApplyTaxes();
        return $this;
    }

    /**
     * Initializes a new Order Pricing Options object.
     */
    public function build(): OrderPricingOptions
    {
        return CoreHelper::clone($this->instance);
    }
}
