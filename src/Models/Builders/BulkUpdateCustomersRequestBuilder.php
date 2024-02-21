<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkUpdateCustomersRequest;

/**
 * Builder for model BulkUpdateCustomersRequest
 *
 * @see BulkUpdateCustomersRequest
 */
class BulkUpdateCustomersRequestBuilder
{
    /**
     * @var BulkUpdateCustomersRequest
     */
    private $instance;

    private function __construct(BulkUpdateCustomersRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk update customers request Builder object.
     */
    public static function init(array $customers): self
    {
        return new self(new BulkUpdateCustomersRequest($customers));
    }

    /**
     * Initializes a new bulk update customers request object.
     */
    public function build(): BulkUpdateCustomersRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
