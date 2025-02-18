<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomAttribute;
use Square\Legacy\Models\UpsertBookingCustomAttributeRequest;

/**
 * Builder for model UpsertBookingCustomAttributeRequest
 *
 * @see UpsertBookingCustomAttributeRequest
 */
class UpsertBookingCustomAttributeRequestBuilder
{
    /**
     * @var UpsertBookingCustomAttributeRequest
     */
    private $instance;

    private function __construct(UpsertBookingCustomAttributeRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Upsert Booking Custom Attribute Request Builder object.
     *
     * @param CustomAttribute $customAttribute
     */
    public static function init(CustomAttribute $customAttribute): self
    {
        return new self(new UpsertBookingCustomAttributeRequest($customAttribute));
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
     * Initializes a new Upsert Booking Custom Attribute Request object.
     */
    public function build(): UpsertBookingCustomAttributeRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
