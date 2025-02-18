<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Money;
use Square\Legacy\Models\SubscriptionPricing;

/**
 * Builder for model SubscriptionPricing
 *
 * @see SubscriptionPricing
 */
class SubscriptionPricingBuilder
{
    /**
     * @var SubscriptionPricing
     */
    private $instance;

    private function __construct(SubscriptionPricing $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Subscription Pricing Builder object.
     */
    public static function init(): self
    {
        return new self(new SubscriptionPricing());
    }

    /**
     * Sets type field.
     *
     * @param string|null $value
     */
    public function type(?string $value): self
    {
        $this->instance->setType($value);
        return $this;
    }

    /**
     * Sets discount ids field.
     *
     * @param string[]|null $value
     */
    public function discountIds(?array $value): self
    {
        $this->instance->setDiscountIds($value);
        return $this;
    }

    /**
     * Unsets discount ids field.
     */
    public function unsetDiscountIds(): self
    {
        $this->instance->unsetDiscountIds();
        return $this;
    }

    /**
     * Sets price money field.
     *
     * @param Money|null $value
     */
    public function priceMoney(?Money $value): self
    {
        $this->instance->setPriceMoney($value);
        return $this;
    }

    /**
     * Initializes a new Subscription Pricing object.
     */
    public function build(): SubscriptionPricing
    {
        return CoreHelper::clone($this->instance);
    }
}
