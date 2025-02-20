<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\RetrieveVendorResponse;
use Square\Legacy\Models\Vendor;

/**
 * Builder for model RetrieveVendorResponse
 *
 * @see RetrieveVendorResponse
 */
class RetrieveVendorResponseBuilder
{
    /**
     * @var RetrieveVendorResponse
     */
    private $instance;

    private function __construct(RetrieveVendorResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Vendor Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveVendorResponse());
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
     * Initializes a new Retrieve Vendor Response object.
     */
    public function build(): RetrieveVendorResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
