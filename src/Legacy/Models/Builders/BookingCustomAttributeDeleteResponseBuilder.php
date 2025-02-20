<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BookingCustomAttributeDeleteResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model BookingCustomAttributeDeleteResponse
 *
 * @see BookingCustomAttributeDeleteResponse
 */
class BookingCustomAttributeDeleteResponseBuilder
{
    /**
     * @var BookingCustomAttributeDeleteResponse
     */
    private $instance;

    private function __construct(BookingCustomAttributeDeleteResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Booking Custom Attribute Delete Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BookingCustomAttributeDeleteResponse());
    }

    /**
     * Sets booking id field.
     *
     * @param string|null $value
     */
    public function bookingId(?string $value): self
    {
        $this->instance->setBookingId($value);
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
     * Initializes a new Booking Custom Attribute Delete Response object.
     */
    public function build(): BookingCustomAttributeDeleteResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
