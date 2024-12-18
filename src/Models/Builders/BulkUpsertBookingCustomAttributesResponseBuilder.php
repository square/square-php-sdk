<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BookingCustomAttributeUpsertResponse;
use Square\Models\BulkUpsertBookingCustomAttributesResponse;
use Square\Models\Error;

/**
 * Builder for model BulkUpsertBookingCustomAttributesResponse
 *
 * @see BulkUpsertBookingCustomAttributesResponse
 */
class BulkUpsertBookingCustomAttributesResponseBuilder
{
    /**
     * @var BulkUpsertBookingCustomAttributesResponse
     */
    private $instance;

    private function __construct(BulkUpsertBookingCustomAttributesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Upsert Booking Custom Attributes Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkUpsertBookingCustomAttributesResponse());
    }

    /**
     * Sets values field.
     *
     * @param array<string,BookingCustomAttributeUpsertResponse>|null $value
     */
    public function values(?array $value): self
    {
        $this->instance->setValues($value);
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
     * Initializes a new Bulk Upsert Booking Custom Attributes Response object.
     */
    public function build(): BulkUpsertBookingCustomAttributesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
