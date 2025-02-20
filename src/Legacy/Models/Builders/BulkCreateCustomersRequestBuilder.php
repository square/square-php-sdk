<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkCreateCustomerData;
use Square\Legacy\Models\BulkCreateCustomersRequest;

/**
 * Builder for model BulkCreateCustomersRequest
 *
 * @see BulkCreateCustomersRequest
 */
class BulkCreateCustomersRequestBuilder
{
    /**
     * @var BulkCreateCustomersRequest
     */
    private $instance;

    private function __construct(BulkCreateCustomersRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Create Customers Request Builder object.
     *
     * @param array<string,BulkCreateCustomerData> $customers
     */
    public static function init(array $customers): self
    {
        return new self(new BulkCreateCustomersRequest($customers));
    }

    /**
     * Initializes a new Bulk Create Customers Request object.
     */
    public function build(): BulkCreateCustomersRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
