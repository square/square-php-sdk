<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Booking;
use Square\Legacy\Models\CancelBookingResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model CancelBookingResponse
 *
 * @see CancelBookingResponse
 */
class CancelBookingResponseBuilder
{
    /**
     * @var CancelBookingResponse
     */
    private $instance;

    private function __construct(CancelBookingResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Cancel Booking Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CancelBookingResponse());
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
     * Initializes a new Cancel Booking Response object.
     */
    public function build(): CancelBookingResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
