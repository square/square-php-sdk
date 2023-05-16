<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkUpsertMerchantCustomAttributesRequest;

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
     * Initializes a new bulk upsert merchant custom attributes request Builder object.
     */
    public static function init(array $values): self
    {
        return new self(new BulkUpsertMerchantCustomAttributesRequest($values));
    }

    /**
     * Initializes a new bulk upsert merchant custom attributes request object.
     */
    public function build(): BulkUpsertMerchantCustomAttributesRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
