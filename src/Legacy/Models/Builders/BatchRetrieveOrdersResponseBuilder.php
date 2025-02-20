<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BatchRetrieveOrdersResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Order;

/**
 * Builder for model BatchRetrieveOrdersResponse
 *
 * @see BatchRetrieveOrdersResponse
 */
class BatchRetrieveOrdersResponseBuilder
{
    /**
     * @var BatchRetrieveOrdersResponse
     */
    private $instance;

    private function __construct(BatchRetrieveOrdersResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Batch Retrieve Orders Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BatchRetrieveOrdersResponse());
    }

    /**
     * Sets orders field.
     *
     * @param Order[]|null $value
     */
    public function orders(?array $value): self
    {
        $this->instance->setOrders($value);
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
     * Initializes a new Batch Retrieve Orders Response object.
     */
    public function build(): BatchRetrieveOrdersResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
