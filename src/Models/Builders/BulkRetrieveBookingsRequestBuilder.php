<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkRetrieveBookingsRequest;

/**
 * Builder for model BulkRetrieveBookingsRequest
 *
 * @see BulkRetrieveBookingsRequest
 */
class BulkRetrieveBookingsRequestBuilder
{
    /**
     * @var BulkRetrieveBookingsRequest
     */
    private $instance;

    private function __construct(BulkRetrieveBookingsRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk retrieve bookings request Builder object.
     */
    public static function init(array $bookingIds): self
    {
        return new self(new BulkRetrieveBookingsRequest($bookingIds));
    }

    /**
     * Initializes a new bulk retrieve bookings request object.
     */
    public function build(): BulkRetrieveBookingsRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
