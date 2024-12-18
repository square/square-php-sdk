<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Money;
use Square\Models\ShippingFee;

/**
 * Builder for model ShippingFee
 *
 * @see ShippingFee
 */
class ShippingFeeBuilder
{
    /**
     * @var ShippingFee
     */
    private $instance;

    private function __construct(ShippingFee $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Shipping Fee Builder object.
     *
     * @param Money $charge
     */
    public static function init(Money $charge): self
    {
        return new self(new ShippingFee($charge));
    }

    /**
     * Sets name field.
     *
     * @param string|null $value
     */
    public function name(?string $value): self
    {
        $this->instance->setName($value);
        return $this;
    }

    /**
     * Unsets name field.
     */
    public function unsetName(): self
    {
        $this->instance->unsetName();
        return $this;
    }

    /**
     * Initializes a new Shipping Fee object.
     */
    public function build(): ShippingFee
    {
        return CoreHelper::clone($this->instance);
    }
}
