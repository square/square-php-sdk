<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\OrderUpdated;
use Square\Legacy\Models\OrderUpdatedObject;

/**
 * Builder for model OrderUpdatedObject
 *
 * @see OrderUpdatedObject
 */
class OrderUpdatedObjectBuilder
{
    /**
     * @var OrderUpdatedObject
     */
    private $instance;

    private function __construct(OrderUpdatedObject $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Order Updated Object Builder object.
     */
    public static function init(): self
    {
        return new self(new OrderUpdatedObject());
    }

    /**
     * Sets order updated field.
     *
     * @param OrderUpdated|null $value
     */
    public function orderUpdated(?OrderUpdated $value): self
    {
        $this->instance->setOrderUpdated($value);
        return $this;
    }

    /**
     * Initializes a new Order Updated Object object.
     */
    public function build(): OrderUpdatedObject
    {
        return CoreHelper::clone($this->instance);
    }
}
