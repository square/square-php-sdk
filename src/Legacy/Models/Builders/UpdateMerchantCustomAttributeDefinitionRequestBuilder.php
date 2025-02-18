<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomAttributeDefinition;
use Square\Legacy\Models\UpdateMerchantCustomAttributeDefinitionRequest;

/**
 * Builder for model UpdateMerchantCustomAttributeDefinitionRequest
 *
 * @see UpdateMerchantCustomAttributeDefinitionRequest
 */
class UpdateMerchantCustomAttributeDefinitionRequestBuilder
{
    /**
     * @var UpdateMerchantCustomAttributeDefinitionRequest
     */
    private $instance;

    private function __construct(UpdateMerchantCustomAttributeDefinitionRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Merchant Custom Attribute Definition Request Builder object.
     *
     * @param CustomAttributeDefinition $customAttributeDefinition
     */
    public static function init(CustomAttributeDefinition $customAttributeDefinition): self
    {
        return new self(new UpdateMerchantCustomAttributeDefinitionRequest($customAttributeDefinition));
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
     * Initializes a new Update Merchant Custom Attribute Definition Request object.
     */
    public function build(): UpdateMerchantCustomAttributeDefinitionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
