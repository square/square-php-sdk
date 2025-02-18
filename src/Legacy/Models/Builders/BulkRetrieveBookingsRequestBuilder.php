<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkRetrieveBookingsRequest;

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
     * Initializes a new Bulk Retrieve Bookings Request Builder object.
     *
     * @param string[] $bookingIds
     */
    public static function init(array $bookingIds): self
    {
        return new self(new BulkRetrieveBookingsRequest($bookingIds));
    }

    /**
     * Initializes a new Bulk Retrieve Bookings Request object.
     */
    public function build(): BulkRetrieveBookingsRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
