<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\UpdateVendorRequest;
use Square\Legacy\Models\Vendor;

/**
 * Builder for model UpdateVendorRequest
 *
 * @see UpdateVendorRequest
 */
class UpdateVendorRequestBuilder
{
    /**
     * @var UpdateVendorRequest
     */
    private $instance;

    private function __construct(UpdateVendorRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Vendor Request Builder object.
     *
     * @param Vendor $vendor
     */
    public static function init(Vendor $vendor): self
    {
        return new self(new UpdateVendorRequest($vendor));
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
     * Initializes a new Update Vendor Request object.
     */
    public function build(): UpdateVendorRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
