<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkUpsertMerchantCustomAttributesResponseMerchantCustomAttributeUpsertResponse;
use Square\Models\CustomAttribute;

/**
 * Builder for model BulkUpsertMerchantCustomAttributesResponseMerchantCustomAttributeUpsertResponse
 *
 * @see BulkUpsertMerchantCustomAttributesResponseMerchantCustomAttributeUpsertResponse
 */
class BulkUpsertMerchantCustomAttributesResponseMerchantCustomAttributeUpsertResponseBuilder
{
    /**
     * @var BulkUpsertMerchantCustomAttributesResponseMerchantCustomAttributeUpsertResponse
     */
    private $instance;

    private function __construct(
        BulkUpsertMerchantCustomAttributesResponseMerchantCustomAttributeUpsertResponse $instance
    ) {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk upsert merchant custom attributes response merchant custom attribute upsert
     * response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkUpsertMerchantCustomAttributesResponseMerchantCustomAttributeUpsertResponse());
    }

    /**
     * Sets merchant id field.
     */
    public function merchantId(?string $value): self
    {
        $this->instance->setMerchantId($value);
        return $this;
    }

    /**
     * Sets custom attribute field.
     */
    public function customAttribute(?CustomAttribute $value): self
    {
        $this->instance->setCustomAttribute($value);
        return $this;
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new bulk upsert merchant custom attributes response merchant custom attribute upsert
     * response object.
     */
    public function build(): BulkUpsertMerchantCustomAttributesResponseMerchantCustomAttributeUpsertResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
