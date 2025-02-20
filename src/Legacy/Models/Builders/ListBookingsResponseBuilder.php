<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Booking;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListBookingsResponse;

/**
 * Builder for model ListBookingsResponse
 *
 * @see ListBookingsResponse
 */
class ListBookingsResponseBuilder
{
    /**
     * @var ListBookingsResponse
     */
    private $instance;

    private function __construct(ListBookingsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Bookings Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListBookingsResponse());
    }

    /**
     * Sets bookings field.
     *
     * @param Booking[]|null $value
     */
    public function bookings(?array $value): self
    {
        $this->instance->setBookings($value);
        return $this;
    }

    /**
     * Sets cursor field.
     *
     * @param string|null $value
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
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
     * Initializes a new List Bookings Response object.
     */
    public function build(): ListBookingsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
