<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest;
use Square\Legacy\Models\CustomAttribute;

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
     * Initializes a new Bulk Upsert Merchant Custom Attributes Request Merchant Custom Attribute Upsert
     * Request Builder object.
     *
     * @param string $merchantId
     * @param CustomAttribute $customAttribute
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
     *
     * @param string|null $value
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
     * Initializes a new Bulk Upsert Merchant Custom Attributes Request Merchant Custom Attribute Upsert
     * Request object.
     */
    public function build(): BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
