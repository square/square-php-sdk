<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkCreateCustomersResponse;

/**
 * Builder for model BulkCreateCustomersResponse
 *
 * @see BulkCreateCustomersResponse
 */
class BulkCreateCustomersResponseBuilder
{
    /**
     * @var BulkCreateCustomersResponse
     */
    private $instance;

    private function __construct(BulkCreateCustomersResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk create customers response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkCreateCustomersResponse());
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
     * Initializes a new bulk create customers response object.
     */
    public function build(): BulkCreateCustomersResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
