<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BatchRetrieveInventoryCountsResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\InventoryCount;

/**
 * Builder for model BatchRetrieveInventoryCountsResponse
 *
 * @see BatchRetrieveInventoryCountsResponse
 */
class BatchRetrieveInventoryCountsResponseBuilder
{
    /**
     * @var BatchRetrieveInventoryCountsResponse
     */
    private $instance;

    private function __construct(BatchRetrieveInventoryCountsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Batch Retrieve Inventory Counts Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BatchRetrieveInventoryCountsResponse());
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
     * Sets counts field.
     *
     * @param InventoryCount[]|null $value
     */
    public function counts(?array $value): self
    {
        $this->instance->setCounts($value);
        return $this;
    }

    /**
     * Sets cursor field.
     *
     * @param string|null $value
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
        return $this;
    }

    /**
     * Initializes a new Batch Retrieve Inventory Counts Response object.
     */
    public function build(): BatchRetrieveInventoryCountsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
