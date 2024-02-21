<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkDeleteCustomersResponse;

/**
 * Builder for model BulkDeleteCustomersResponse
 *
 * @see BulkDeleteCustomersResponse
 */
class BulkDeleteCustomersResponseBuilder
{
    /**
     * @var BulkDeleteCustomersResponse
     */
    private $instance;

    private function __construct(BulkDeleteCustomersResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk delete customers response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkDeleteCustomersResponse());
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
     * Initializes a new bulk delete customers response object.
     */
    public function build(): BulkDeleteCustomersResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
