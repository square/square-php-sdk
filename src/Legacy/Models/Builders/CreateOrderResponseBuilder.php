<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateOrderResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Order;

/**
 * Builder for model CreateOrderResponse
 *
 * @see CreateOrderResponse
 */
class CreateOrderResponseBuilder
{
    /**
     * @var CreateOrderResponse
     */
    private $instance;

    private function __construct(CreateOrderResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Order Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateOrderResponse());
    }

    /**
     * Sets order field.
     *
     * @param Order|null $value
     */
    public function order(?Order $value): self
    {
        $this->instance->setOrder($value);
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
     * Initializes a new Create Order Response object.
     */
    public function build(): CreateOrderResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
