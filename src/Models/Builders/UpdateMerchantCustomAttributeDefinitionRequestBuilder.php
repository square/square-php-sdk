<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CustomAttributeDefinition;
use Square\Models\UpdateMerchantCustomAttributeDefinitionRequest;

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
     * Initializes a new update merchant custom attribute definition request Builder object.
     */
    public static function init(CustomAttributeDefinition $customAttributeDefinition): self
    {
        return new self(new UpdateMerchantCustomAttributeDefinitionRequest($customAttributeDefinition));
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
     * Initializes a new update merchant custom attribute definition request object.
     */
    public function build(): UpdateMerchantCustomAttributeDefinitionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
