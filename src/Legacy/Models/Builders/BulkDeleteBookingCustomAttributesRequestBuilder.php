<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BookingCustomAttributeDeleteRequest;
use Square\Legacy\Models\BulkDeleteBookingCustomAttributesRequest;

/**
 * Builder for model BulkDeleteBookingCustomAttributesRequest
 *
 * @see BulkDeleteBookingCustomAttributesRequest
 */
class BulkDeleteBookingCustomAttributesRequestBuilder
{
    /**
     * @var BulkDeleteBookingCustomAttributesRequest
     */
    private $instance;

    private function __construct(BulkDeleteBookingCustomAttributesRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Delete Booking Custom Attributes Request Builder object.
     *
     * @param array<string,BookingCustomAttributeDeleteRequest> $values
     */
    public static function init(array $values): self
    {
        return new self(new BulkDeleteBookingCustomAttributesRequest($values));
    }

    /**
     * Initializes a new Bulk Delete Booking Custom Attributes Request object.
     */
    public function build(): BulkDeleteBookingCustomAttributesRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
