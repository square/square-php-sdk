<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkRetrieveCustomersRequest;

/**
 * Builder for model BulkRetrieveCustomersRequest
 *
 * @see BulkRetrieveCustomersRequest
 */
class BulkRetrieveCustomersRequestBuilder
{
    /**
     * @var BulkRetrieveCustomersRequest
     */
    private $instance;

    private function __construct(BulkRetrieveCustomersRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Retrieve Customers Request Builder object.
     *
     * @param string[] $customerIds
     */
    public static function init(array $customerIds): self
    {
        return new self(new BulkRetrieveCustomersRequest($customerIds));
    }

    /**
     * Initializes a new Bulk Retrieve Customers Request object.
     */
    public function build(): BulkRetrieveCustomersRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
