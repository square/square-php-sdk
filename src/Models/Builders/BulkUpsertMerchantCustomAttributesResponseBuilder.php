<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkUpsertMerchantCustomAttributesResponse;

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
     * Initializes a new bulk upsert merchant custom attributes response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkUpsertMerchantCustomAttributesResponse());
    }

    /**
     * Sets values field.
     */
    public function values(?array $value): self
    {
        $this->instance->setValues($value);
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
     * Initializes a new bulk upsert merchant custom attributes response object.
     */
    public function build(): BulkUpsertMerchantCustomAttributesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
