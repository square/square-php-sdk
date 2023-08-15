<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkRetrieveBookingsResponse;

/**
 * Builder for model BulkRetrieveBookingsResponse
 *
 * @see BulkRetrieveBookingsResponse
 */
class BulkRetrieveBookingsResponseBuilder
{
    /**
     * @var BulkRetrieveBookingsResponse
     */
    private $instance;

    private function __construct(BulkRetrieveBookingsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk retrieve bookings response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkRetrieveBookingsResponse());
    }

    /**
     * Sets bookings field.
     */
    public function bookings(?array $value): self
    {
        $this->instance->setBookings($value);
        return $this;
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new bulk retrieve bookings response object.
     */
    public function build(): BulkRetrieveBookingsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
