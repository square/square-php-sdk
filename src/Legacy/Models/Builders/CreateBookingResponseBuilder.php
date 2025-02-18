<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Booking;
use Square\Legacy\Models\CreateBookingResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model CreateBookingResponse
 *
 * @see CreateBookingResponse
 */
class CreateBookingResponseBuilder
{
    /**
     * @var CreateBookingResponse
     */
    private $instance;

    private function __construct(CreateBookingResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Booking Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateBookingResponse());
    }

    /**
     * Sets booking field.
     *
     * @param Booking|null $value
     */
    public function booking(?Booking $value): self
    {
        $this->instance->setBooking($value);
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
     * Initializes a new Create Booking Response object.
     */
    public function build(): CreateBookingResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
