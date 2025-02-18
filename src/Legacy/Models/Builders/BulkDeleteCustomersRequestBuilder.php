<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkDeleteCustomersRequest;

/**
 * Builder for model BulkDeleteCustomersRequest
 *
 * @see BulkDeleteCustomersRequest
 */
class BulkDeleteCustomersRequestBuilder
{
    /**
     * @var BulkDeleteCustomersRequest
     */
    private $instance;

    private function __construct(BulkDeleteCustomersRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Delete Customers Request Builder object.
     *
     * @param string[] $customerIds
     */
    public static function init(array $customerIds): self
    {
        return new self(new BulkDeleteCustomersRequest($customerIds));
    }

    /**
     * Initializes a new Bulk Delete Customers Request object.
     */
    public function build(): BulkDeleteCustomersRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
