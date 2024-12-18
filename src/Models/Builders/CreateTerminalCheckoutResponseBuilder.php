<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CreateTerminalCheckoutResponse;
use Square\Models\Error;
use Square\Models\TerminalCheckout;

/**
 * Builder for model CreateTerminalCheckoutResponse
 *
 * @see CreateTerminalCheckoutResponse
 */
class CreateTerminalCheckoutResponseBuilder
{
    /**
     * @var CreateTerminalCheckoutResponse
     */
    private $instance;

    private function __construct(CreateTerminalCheckoutResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Terminal Checkout Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateTerminalCheckoutResponse());
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
     * Sets checkout field.
     *
     * @param TerminalCheckout|null $value
     */
    public function checkout(?TerminalCheckout $value): self
    {
        $this->instance->setCheckout($value);
        return $this;
    }

    /**
     * Initializes a new Create Terminal Checkout Response object.
     */
    public function build(): CreateTerminalCheckoutResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
