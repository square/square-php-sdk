<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\RetrieveBookingCustomAttributeDefinitionRequest;

/**
 * Builder for model RetrieveBookingCustomAttributeDefinitionRequest
 *
 * @see RetrieveBookingCustomAttributeDefinitionRequest
 */
class RetrieveBookingCustomAttributeDefinitionRequestBuilder
{
    /**
     * @var RetrieveBookingCustomAttributeDefinitionRequest
     */
    private $instance;

    private function __construct(RetrieveBookingCustomAttributeDefinitionRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Booking Custom Attribute Definition Request Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveBookingCustomAttributeDefinitionRequest());
    }

    /**
     * Sets version field.
     *
     * @param int|null $value
     */
    public function version(?int $value): self
    {
        $this->instance->setVersion($value);
        return $this;
    }

    /**
     * Initializes a new Retrieve Booking Custom Attribute Definition Request object.
     */
    public function build(): RetrieveBookingCustomAttributeDefinitionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
