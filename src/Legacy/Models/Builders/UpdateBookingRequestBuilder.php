<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Booking;
use Square\Legacy\Models\UpdateBookingRequest;

/**
 * Builder for model UpdateBookingRequest
 *
 * @see UpdateBookingRequest
 */
class UpdateBookingRequestBuilder
{
    /**
     * @var UpdateBookingRequest
     */
    private $instance;

    private function __construct(UpdateBookingRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Booking Request Builder object.
     *
     * @param Booking $booking
     */
    public static function init(Booking $booking): self
    {
        return new self(new UpdateBookingRequest($booking));
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
     * Unsets idempotency key field.
     */
    public function unsetIdempotencyKey(): self
    {
        $this->instance->unsetIdempotencyKey();
        return $this;
    }

    /**
     * Initializes a new Update Booking Request object.
     */
    public function build(): UpdateBookingRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
