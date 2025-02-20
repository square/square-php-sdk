<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkCreateCustomersResponse;
use Square\Legacy\Models\CreateCustomerResponse;
use Square\Legacy\Models\Error;

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
     * Initializes a new Bulk Create Customers Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkCreateCustomersResponse());
    }

    /**
     * Sets responses field.
     *
     * @param array<string,CreateCustomerResponse>|null $value
     */
    public function responses(?array $value): self
    {
        $this->instance->setResponses($value);
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
     * Initializes a new Bulk Create Customers Response object.
     */
    public function build(): BulkCreateCustomersResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
