<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse;

/**
 * Builder for model BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse
 *
 * @see BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse
 */
class BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponseBuilder
{
    /**
     * @var BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse
     */
    private $instance;

    private function __construct(
        BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse $instance
    ) {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk delete merchant custom attributes response merchant custom attribute delete
     * response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse());
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
     * Initializes a new bulk delete merchant custom attributes response merchant custom attribute delete
     * response object.
     */
    public function build(): BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
