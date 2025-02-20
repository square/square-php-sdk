<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BookingCustomAttributeDeleteRequest;

/**
 * Builder for model BookingCustomAttributeDeleteRequest
 *
 * @see BookingCustomAttributeDeleteRequest
 */
class BookingCustomAttributeDeleteRequestBuilder
{
    /**
     * @var BookingCustomAttributeDeleteRequest
     */
    private $instance;

    private function __construct(BookingCustomAttributeDeleteRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Booking Custom Attribute Delete Request Builder object.
     *
     * @param string $bookingId
     * @param string $key
     */
    public static function init(string $bookingId, string $key): self
    {
        return new self(new BookingCustomAttributeDeleteRequest($bookingId, $key));
    }

    /**
     * Initializes a new Booking Custom Attribute Delete Request object.
     */
    public function build(): BookingCustomAttributeDeleteRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
