<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CancelInvoiceRequest;

/**
 * Builder for model CancelInvoiceRequest
 *
 * @see CancelInvoiceRequest
 */
class CancelInvoiceRequestBuilder
{
    /**
     * @var CancelInvoiceRequest
     */
    private $instance;

    private function __construct(CancelInvoiceRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Cancel Invoice Request Builder object.
     *
     * @param int $version
     */
    public static function init(int $version): self
    {
        return new self(new CancelInvoiceRequest($version));
    }

    /**
     * Initializes a new Cancel Invoice Request object.
     */
    public function build(): CancelInvoiceRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
