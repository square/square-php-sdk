<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkUpdateVendorsResponse;
use Square\Models\Error;
use Square\Models\UpdateVendorResponse;

/**
 * Builder for model BulkUpdateVendorsResponse
 *
 * @see BulkUpdateVendorsResponse
 */
class BulkUpdateVendorsResponseBuilder
{
    /**
     * @var BulkUpdateVendorsResponse
     */
    private $instance;

    private function __construct(BulkUpdateVendorsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Update Vendors Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkUpdateVendorsResponse());
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
     * Sets responses field.
     *
     * @param array<string,UpdateVendorResponse>|null $value
     */
    public function responses(?array $value): self
    {
        $this->instance->setResponses($value);
        return $this;
    }

    /**
     * Initializes a new Bulk Update Vendors Response object.
     */
    public function build(): BulkUpdateVendorsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
