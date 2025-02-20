<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse;
use Square\Legacy\Models\Error;

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
     * Initializes a new Bulk Delete Merchant Custom Attributes Response Merchant Custom Attribute Delete
     * Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse());
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
     * Initializes a new Bulk Delete Merchant Custom Attributes Response Merchant Custom Attribute Delete
     * Response object.
     */
    public function build(): BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
