<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Order;
use Square\Legacy\Models\UpdateOrderResponse;

/**
 * Builder for model UpdateOrderResponse
 *
 * @see UpdateOrderResponse
 */
class UpdateOrderResponseBuilder
{
    /**
     * @var UpdateOrderResponse
     */
    private $instance;

    private function __construct(UpdateOrderResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Order Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateOrderResponse());
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
     * Initializes a new Update Order Response object.
     */
    public function build(): UpdateOrderResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
