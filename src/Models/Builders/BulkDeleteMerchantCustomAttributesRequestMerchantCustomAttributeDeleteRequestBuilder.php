<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest;

/**
 * Builder for model BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest
 *
 * @see BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest
 */
class BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequestBuilder
{
    /**
     * @var BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest
     */
    private $instance;

    private function __construct(
        BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest $instance
    ) {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk delete merchant custom attributes request merchant custom attribute delete
     * request Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest());
    }

    /**
     * Sets key field.
     */
    public function key(?string $value): self
    {
        $this->instance->setKey($value);
        return $this;
    }

    /**
     * Initializes a new bulk delete merchant custom attributes request merchant custom attribute delete
     * request object.
     */
    public function build(): BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
