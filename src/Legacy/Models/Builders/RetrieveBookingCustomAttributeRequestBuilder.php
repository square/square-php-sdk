<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\RetrieveBookingCustomAttributeRequest;

/**
 * Builder for model RetrieveBookingCustomAttributeRequest
 *
 * @see RetrieveBookingCustomAttributeRequest
 */
class RetrieveBookingCustomAttributeRequestBuilder
{
    /**
     * @var RetrieveBookingCustomAttributeRequest
     */
    private $instance;

    private function __construct(RetrieveBookingCustomAttributeRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Booking Custom Attribute Request Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveBookingCustomAttributeRequest());
    }

    /**
     * Sets with definition field.
     *
     * @param bool|null $value
     */
    public function withDefinition(?bool $value): self
    {
        $this->instance->setWithDefinition($value);
        return $this;
    }

    /**
     * Unsets with definition field.
     */
    public function unsetWithDefinition(): self
    {
        $this->instance->unsetWithDefinition();
        return $this;
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
     * Initializes a new Retrieve Booking Custom Attribute Request object.
     */
    public function build(): RetrieveBookingCustomAttributeRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
