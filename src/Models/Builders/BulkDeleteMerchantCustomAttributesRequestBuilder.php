<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkDeleteMerchantCustomAttributesRequest;

/**
 * Builder for model BulkDeleteMerchantCustomAttributesRequest
 *
 * @see BulkDeleteMerchantCustomAttributesRequest
 */
class BulkDeleteMerchantCustomAttributesRequestBuilder
{
    /**
     * @var BulkDeleteMerchantCustomAttributesRequest
     */
    private $instance;

    private function __construct(BulkDeleteMerchantCustomAttributesRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk delete merchant custom attributes request Builder object.
     */
    public static function init(array $values): self
    {
        return new self(new BulkDeleteMerchantCustomAttributesRequest($values));
    }

    /**
     * Initializes a new bulk delete merchant custom attributes request object.
     */
    public function build(): BulkDeleteMerchantCustomAttributesRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
