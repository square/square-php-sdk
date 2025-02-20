<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkUpsertMerchantCustomAttributesResponse;
use Square\Legacy\Models\BulkUpsertMerchantCustomAttributesResponseMerchantCustomAttributeUpsertResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model BulkUpsertMerchantCustomAttributesResponse
 *
 * @see BulkUpsertMerchantCustomAttributesResponse
 */
class BulkUpsertMerchantCustomAttributesResponseBuilder
{
    /**
     * @var BulkUpsertMerchantCustomAttributesResponse
     */
    private $instance;

    private function __construct(BulkUpsertMerchantCustomAttributesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Upsert Merchant Custom Attributes Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkUpsertMerchantCustomAttributesResponse());
    }

    /**
     * Sets values field.
     *
     * @param array<string,BulkUpsertMerchantCustomAttributesResponseMerchantCustomAttributeUpsertResponse>|null $value
     */
    public function values(?array $value): self
    {
        $this->instance->setValues($value);
        return $this;
    }

    /**
     * Sets errors field.
     *
     * @param Error[]|null $value
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new Bulk Upsert Merchant Custom Attributes Response object.
     */
    public function build(): BulkUpsertMerchantCustomAttributesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
