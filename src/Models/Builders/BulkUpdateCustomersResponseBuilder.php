<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkUpdateCustomersResponse;

/**
 * Builder for model BulkUpdateCustomersResponse
 *
 * @see BulkUpdateCustomersResponse
 */
class BulkUpdateCustomersResponseBuilder
{
    /**
     * @var BulkUpdateCustomersResponse
     */
    private $instance;

    private function __construct(BulkUpdateCustomersResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk update customers response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkUpdateCustomersResponse());
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
     * Initializes a new bulk update customers response object.
     */
    public function build(): BulkUpdateCustomersResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
