<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkRetrieveBookingsResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\RetrieveBookingResponse;

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
     * Initializes a new Bulk Retrieve Bookings Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkRetrieveBookingsResponse());
    }

    /**
     * Sets bookings field.
     *
     * @param array<string,RetrieveBookingResponse>|null $value
     */
    public function bookings(?array $value): self
    {
        $this->instance->setBookings($value);
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
     * Initializes a new Bulk Retrieve Bookings Response object.
     */
    public function build(): BulkRetrieveBookingsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
