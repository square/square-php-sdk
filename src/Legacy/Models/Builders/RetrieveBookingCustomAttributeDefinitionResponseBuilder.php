<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomAttributeDefinition;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\RetrieveBookingCustomAttributeDefinitionResponse;

/**
 * Builder for model RetrieveBookingCustomAttributeDefinitionResponse
 *
 * @see RetrieveBookingCustomAttributeDefinitionResponse
 */
class RetrieveBookingCustomAttributeDefinitionResponseBuilder
{
    /**
     * @var RetrieveBookingCustomAttributeDefinitionResponse
     */
    private $instance;

    private function __construct(RetrieveBookingCustomAttributeDefinitionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Booking Custom Attribute Definition Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveBookingCustomAttributeDefinitionResponse());
    }

    /**
     * Sets custom attribute definition field.
     *
     * @param CustomAttributeDefinition|null $value
     */
    public function customAttributeDefinition(?CustomAttributeDefinition $value): self
    {
        $this->instance->setCustomAttributeDefinition($value);
        return $this;
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
     * Initializes a new Retrieve Booking Custom Attribute Definition Response object.
     */
    public function build(): RetrieveBookingCustomAttributeDefinitionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
