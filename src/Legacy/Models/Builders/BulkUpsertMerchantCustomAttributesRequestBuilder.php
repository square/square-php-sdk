<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkUpsertMerchantCustomAttributesRequest;
use Square\Legacy\Models\BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest;

/**
 * Builder for model BulkUpsertMerchantCustomAttributesRequest
 *
 * @see BulkUpsertMerchantCustomAttributesRequest
 */
class BulkUpsertMerchantCustomAttributesRequestBuilder
{
    /**
     * @var BulkUpsertMerchantCustomAttributesRequest
     */
    private $instance;

    private function __construct(BulkUpsertMerchantCustomAttributesRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Upsert Merchant Custom Attributes Request Builder object.
     *
     * @param array<string,BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest> $values
     */
    public static function init(array $values): self
    {
        return new self(new BulkUpsertMerchantCustomAttributesRequest($values));
    }

    /**
     * Initializes a new Bulk Upsert Merchant Custom Attributes Request object.
     */
    public function build(): BulkUpsertMerchantCustomAttributesRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
