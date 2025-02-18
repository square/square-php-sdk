<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateVendorResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Vendor;

/**
 * Builder for model CreateVendorResponse
 *
 * @see CreateVendorResponse
 */
class CreateVendorResponseBuilder
{
    /**
     * @var CreateVendorResponse
     */
    private $instance;

    private function __construct(CreateVendorResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Vendor Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateVendorResponse());
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
     * Initializes a new Create Vendor Response object.
     */
    public function build(): CreateVendorResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
