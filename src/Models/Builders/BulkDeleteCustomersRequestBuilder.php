<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkDeleteCustomersRequest;

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
     * Initializes a new bulk delete customers request Builder object.
     */
    public static function init(array $customerIds): self
    {
        return new self(new BulkDeleteCustomersRequest($customerIds));
    }

    /**
     * Initializes a new bulk delete customers request object.
     */
    public function build(): BulkDeleteCustomersRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
