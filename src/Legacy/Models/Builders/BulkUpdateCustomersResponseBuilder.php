<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkUpdateCustomersResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\UpdateCustomerResponse;

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
     * Initializes a new Bulk Update Customers Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkUpdateCustomersResponse());
    }

    /**
     * Sets responses field.
     *
     * @param array<string,UpdateCustomerResponse>|null $value
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
     * Initializes a new Bulk Update Customers Response object.
     */
    public function build(): BulkUpdateCustomersResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
