<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomAttributeDefinition;
use Square\Legacy\Models\UpdateLocationCustomAttributeDefinitionRequest;

/**
 * Builder for model UpdateLocationCustomAttributeDefinitionRequest
 *
 * @see UpdateLocationCustomAttributeDefinitionRequest
 */
class UpdateLocationCustomAttributeDefinitionRequestBuilder
{
    /**
     * @var UpdateLocationCustomAttributeDefinitionRequest
     */
    private $instance;

    private function __construct(UpdateLocationCustomAttributeDefinitionRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Location Custom Attribute Definition Request Builder object.
     *
     * @param CustomAttributeDefinition $customAttributeDefinition
     */
    public static function init(CustomAttributeDefinition $customAttributeDefinition): self
    {
        return new self(new UpdateLocationCustomAttributeDefinitionRequest($customAttributeDefinition));
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
     * Initializes a new Update Location Custom Attribute Definition Request object.
     */
    public function build(): UpdateLocationCustomAttributeDefinitionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
