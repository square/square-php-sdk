<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkRetrieveCustomersResponse;

/**
 * Builder for model BulkRetrieveCustomersResponse
 *
 * @see BulkRetrieveCustomersResponse
 */
class BulkRetrieveCustomersResponseBuilder
{
    /**
     * @var BulkRetrieveCustomersResponse
     */
    private $instance;

    private function __construct(BulkRetrieveCustomersResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk retrieve customers response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkRetrieveCustomersResponse());
    }

    /**
     * Sets responses field.
     */
    public function responses(?array $value): self
    {
        $this->instance->setResponses($value);
        return $this;
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
     * Initializes a new bulk retrieve customers response object.
     */
    public function build(): BulkRetrieveCustomersResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
