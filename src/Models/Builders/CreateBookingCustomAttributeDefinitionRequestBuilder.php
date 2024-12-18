<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CreateBookingCustomAttributeDefinitionRequest;
use Square\Models\CustomAttributeDefinition;

/**
 * Builder for model CreateBookingCustomAttributeDefinitionRequest
 *
 * @see CreateBookingCustomAttributeDefinitionRequest
 */
class CreateBookingCustomAttributeDefinitionRequestBuilder
{
    /**
     * @var CreateBookingCustomAttributeDefinitionRequest
     */
    private $instance;

    private function __construct(CreateBookingCustomAttributeDefinitionRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Booking Custom Attribute Definition Request Builder object.
     *
     * @param CustomAttributeDefinition $customAttributeDefinition
     */
    public static function init(CustomAttributeDefinition $customAttributeDefinition): self
    {
        return new self(new CreateBookingCustomAttributeDefinitionRequest($customAttributeDefinition));
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
     * Initializes a new Create Booking Custom Attribute Definition Request object.
     */
    public function build(): CreateBookingCustomAttributeDefinitionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
