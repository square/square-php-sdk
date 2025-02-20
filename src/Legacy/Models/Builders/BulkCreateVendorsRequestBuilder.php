<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkCreateVendorsRequest;
use Square\Legacy\Models\Vendor;

/**
 * Builder for model BulkCreateVendorsRequest
 *
 * @see BulkCreateVendorsRequest
 */
class BulkCreateVendorsRequestBuilder
{
    /**
     * @var BulkCreateVendorsRequest
     */
    private $instance;

    private function __construct(BulkCreateVendorsRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Create Vendors Request Builder object.
     *
     * @param array<string,Vendor> $vendors
     */
    public static function init(array $vendors): self
    {
        return new self(new BulkCreateVendorsRequest($vendors));
    }

    /**
     * Initializes a new Bulk Create Vendors Request object.
     */
    public function build(): BulkCreateVendorsRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
