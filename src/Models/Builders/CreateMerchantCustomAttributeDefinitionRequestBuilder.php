<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CreateMerchantCustomAttributeDefinitionRequest;
use Square\Models\CustomAttributeDefinition;

/**
 * Builder for model CreateMerchantCustomAttributeDefinitionRequest
 *
 * @see CreateMerchantCustomAttributeDefinitionRequest
 */
class CreateMerchantCustomAttributeDefinitionRequestBuilder
{
    /**
     * @var CreateMerchantCustomAttributeDefinitionRequest
     */
    private $instance;

    private function __construct(CreateMerchantCustomAttributeDefinitionRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new create merchant custom attribute definition request Builder object.
     */
    public static function init(CustomAttributeDefinition $customAttributeDefinition): self
    {
        return new self(new CreateMerchantCustomAttributeDefinitionRequest($customAttributeDefinition));
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
     * Initializes a new create merchant custom attribute definition request object.
     */
    public function build(): CreateMerchantCustomAttributeDefinitionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
