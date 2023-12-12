<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DismissTerminalCheckoutResponse;
use Square\Models\TerminalCheckout;

/**
 * Builder for model DismissTerminalCheckoutResponse
 *
 * @see DismissTerminalCheckoutResponse
 */
class DismissTerminalCheckoutResponseBuilder
{
    /**
     * @var DismissTerminalCheckoutResponse
     */
    private $instance;

    private function __construct(DismissTerminalCheckoutResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new dismiss terminal checkout response Builder object.
     */
    public static function init(): self
    {
        return new self(new DismissTerminalCheckoutResponse());
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets checkout field.
     */
    public function checkout(?TerminalCheckout $value): self
    {
        $this->instance->setCheckout($value);
        return $this;
    }

    /**
     * Initializes a new dismiss terminal checkout response object.
     */
    public function build(): DismissTerminalCheckoutResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
