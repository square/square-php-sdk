<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomAttributeDefinition;
use Square\Legacy\Models\UpdateOrderCustomAttributeDefinitionRequest;

/**
 * Builder for model UpdateOrderCustomAttributeDefinitionRequest
 *
 * @see UpdateOrderCustomAttributeDefinitionRequest
 */
class UpdateOrderCustomAttributeDefinitionRequestBuilder
{
    /**
     * @var UpdateOrderCustomAttributeDefinitionRequest
     */
    private $instance;

    private function __construct(UpdateOrderCustomAttributeDefinitionRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Order Custom Attribute Definition Request Builder object.
     *
     * @param CustomAttributeDefinition $customAttributeDefinition
     */
    public static function init(CustomAttributeDefinition $customAttributeDefinition): self
    {
        return new self(new UpdateOrderCustomAttributeDefinitionRequest($customAttributeDefinition));
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
     * Initializes a new Update Order Custom Attribute Definition Request object.
     */
    public function build(): UpdateOrderCustomAttributeDefinitionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
