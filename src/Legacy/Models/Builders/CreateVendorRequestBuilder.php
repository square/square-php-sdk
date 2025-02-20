<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateVendorRequest;
use Square\Legacy\Models\Vendor;

/**
 * Builder for model CreateVendorRequest
 *
 * @see CreateVendorRequest
 */
class CreateVendorRequestBuilder
{
    /**
     * @var CreateVendorRequest
     */
    private $instance;

    private function __construct(CreateVendorRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Vendor Request Builder object.
     *
     * @param string $idempotencyKey
     */
    public static function init(string $idempotencyKey): self
    {
        return new self(new CreateVendorRequest($idempotencyKey));
    }

    /**
     * Sets vendor field.
     *
     * @param Vendor|null $value
     */
    public function vendor(?Vendor $value): self
    {
        $this->instance->setVendor($value);
        return $this;
    }

    /**
     * Initializes a new Create Vendor Request object.
     */
    public function build(): CreateVendorRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
