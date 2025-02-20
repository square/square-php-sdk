<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BatchChangeInventoryRequest;
use Square\Legacy\Models\InventoryChange;

/**
 * Builder for model BatchChangeInventoryRequest
 *
 * @see BatchChangeInventoryRequest
 */
class BatchChangeInventoryRequestBuilder
{
    /**
     * @var BatchChangeInventoryRequest
     */
    private $instance;

    private function __construct(BatchChangeInventoryRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Batch Change Inventory Request Builder object.
     *
     * @param string $idempotencyKey
     */
    public static function init(string $idempotencyKey): self
    {
        return new self(new BatchChangeInventoryRequest($idempotencyKey));
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
     * Unsets changes field.
     */
    public function unsetChanges(): self
    {
        $this->instance->unsetChanges();
        return $this;
    }

    /**
     * Sets ignore unchanged counts field.
     *
     * @param bool|null $value
     */
    public function ignoreUnchangedCounts(?bool $value): self
    {
        $this->instance->setIgnoreUnchangedCounts($value);
        return $this;
    }

    /**
     * Unsets ignore unchanged counts field.
     */
    public function unsetIgnoreUnchangedCounts(): self
    {
        $this->instance->unsetIgnoreUnchangedCounts();
        return $this;
    }

    /**
     * Initializes a new Batch Change Inventory Request object.
     */
    public function build(): BatchChangeInventoryRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
