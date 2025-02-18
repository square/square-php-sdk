<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\InventoryAdjustment;
use Square\Legacy\Models\RetrieveInventoryAdjustmentResponse;

/**
 * Builder for model RetrieveInventoryAdjustmentResponse
 *
 * @see RetrieveInventoryAdjustmentResponse
 */
class RetrieveInventoryAdjustmentResponseBuilder
{
    /**
     * @var RetrieveInventoryAdjustmentResponse
     */
    private $instance;

    private function __construct(RetrieveInventoryAdjustmentResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Inventory Adjustment Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveInventoryAdjustmentResponse());
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
     * Sets adjustment field.
     *
     * @param InventoryAdjustment|null $value
     */
    public function adjustment(?InventoryAdjustment $value): self
    {
        $this->instance->setAdjustment($value);
        return $this;
    }

    /**
     * Initializes a new Retrieve Inventory Adjustment Response object.
     */
    public function build(): RetrieveInventoryAdjustmentResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
