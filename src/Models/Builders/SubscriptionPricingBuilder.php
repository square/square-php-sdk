<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Money;
use Square\Models\SubscriptionPricing;

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
     * Initializes a new subscription pricing Builder object.
     */
    public static function init(): self
    {
        return new self(new SubscriptionPricing());
    }

    /**
     * Sets type field.
     */
    public function type(?string $value): self
    {
        $this->instance->setType($value);
        return $this;
    }

    /**
     * Sets discount ids field.
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
     */
    public function priceMoney(?Money $value): self
    {
        $this->instance->setPriceMoney($value);
        return $this;
    }

    /**
     * Initializes a new subscription pricing object.
     */
    public function build(): SubscriptionPricing
    {
        return CoreHelper::clone($this->instance);
    }
}
