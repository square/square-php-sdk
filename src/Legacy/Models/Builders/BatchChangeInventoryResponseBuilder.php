<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BatchChangeInventoryResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\InventoryChange;
use Square\Legacy\Models\InventoryCount;

/**
 * Builder for model BatchChangeInventoryResponse
 *
 * @see BatchChangeInventoryResponse
 */
class BatchChangeInventoryResponseBuilder
{
    /**
     * @var BatchChangeInventoryResponse
     */
    private $instance;

    private function __construct(BatchChangeInventoryResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Batch Change Inventory Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BatchChangeInventoryResponse());
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
     * Sets changes field.
     *
     * @param InventoryChange[]|null $value
     */
    public function changes(?array $value): self
    {
        $this->instance->setChanges($value);
        return $this;
    }

    /**
     * Initializes a new Batch Change Inventory Response object.
     */
    public function build(): BatchChangeInventoryResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
