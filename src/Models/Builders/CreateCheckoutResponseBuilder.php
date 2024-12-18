<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Checkout;
use Square\Models\CreateCheckoutResponse;
use Square\Models\Error;

/**
 * Builder for model CreateCheckoutResponse
 *
 * @see CreateCheckoutResponse
 */
class CreateCheckoutResponseBuilder
{
    /**
     * @var CreateCheckoutResponse
     */
    private $instance;

    private function __construct(CreateCheckoutResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Checkout Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateCheckoutResponse());
    }

    /**
     * Sets checkout field.
     *
     * @param Checkout|null $value
     */
    public function checkout(?Checkout $value): self
    {
        $this->instance->setCheckout($value);
        return $this;
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
     * Initializes a new Create Checkout Response object.
     */
    public function build(): CreateCheckoutResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
