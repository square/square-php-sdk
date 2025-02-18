<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkDeleteMerchantCustomAttributesRequest;
use Square\Legacy\Models\BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest;

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
     * Initializes a new Bulk Delete Merchant Custom Attributes Request Builder object.
     *
     * @param array<string,BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest> $values
     */
    public static function init(array $values): self
    {
        return new self(new BulkDeleteMerchantCustomAttributesRequest($values));
    }

    /**
     * Initializes a new Bulk Delete Merchant Custom Attributes Request object.
     */
    public function build(): BulkDeleteMerchantCustomAttributesRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
