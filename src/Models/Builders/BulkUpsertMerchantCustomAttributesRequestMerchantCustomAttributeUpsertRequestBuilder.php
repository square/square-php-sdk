<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest;
use Square\Models\CustomAttribute;

/**
 * Builder for model BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest
 *
 * @see BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest
 */
class BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequestBuilder
{
    /**
     * @var BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest
     */
    private $instance;

    private function __construct(
        BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest $instance
    ) {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk upsert merchant custom attributes request merchant custom attribute upsert
     * request Builder object.
     */
    public static function init(string $merchantId, CustomAttribute $customAttribute): self
    {
        return new self(new BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest(
            $merchantId,
            $customAttribute
        ));
    }

    /**
     * Sets idempotency key field.
     */
    public function idempotencyKey(?string $value): self
    {
        $this->instance->setIdempotencyKey($value);
        return $this;
    }

    /**
     * Unsets idempotency key field.
     */
    public function unsetIdempotencyKey(): self
    {
        $this->instance->unsetIdempotencyKey();
        return $this;
    }

    /**
     * Initializes a new bulk upsert merchant custom attributes request merchant custom attribute upsert
     * request object.
     */
    public function build(): BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
