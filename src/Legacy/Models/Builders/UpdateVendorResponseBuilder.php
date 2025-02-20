<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\UpdateVendorResponse;
use Square\Legacy\Models\Vendor;

/**
 * Builder for model UpdateVendorResponse
 *
 * @see UpdateVendorResponse
 */
class UpdateVendorResponseBuilder
{
    /**
     * @var UpdateVendorResponse
     */
    private $instance;

    private function __construct(UpdateVendorResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Vendor Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateVendorResponse());
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
     * Initializes a new Update Vendor Response object.
     */
    public function build(): UpdateVendorResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
