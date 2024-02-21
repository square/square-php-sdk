<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkCreateCustomersRequest;

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
     * Initializes a new bulk create customers request Builder object.
     */
    public static function init(array $customers): self
    {
        return new self(new BulkCreateCustomersRequest($customers));
    }

    /**
     * Initializes a new bulk create customers request object.
     */
    public function build(): BulkCreateCustomersRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
