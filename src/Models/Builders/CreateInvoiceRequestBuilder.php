<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CreateInvoiceRequest;
use Square\Models\Invoice;

/**
 * Builder for model CreateInvoiceRequest
 *
 * @see CreateInvoiceRequest
 */
class CreateInvoiceRequestBuilder
{
    /**
     * @var CreateInvoiceRequest
     */
    private $instance;

    private function __construct(CreateInvoiceRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Invoice Request Builder object.
     *
     * @param Invoice $invoice
     */
    public static function init(Invoice $invoice): self
    {
        return new self(new CreateInvoiceRequest($invoice));
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
     * Initializes a new Create Invoice Request object.
     */
    public function build(): CreateInvoiceRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
