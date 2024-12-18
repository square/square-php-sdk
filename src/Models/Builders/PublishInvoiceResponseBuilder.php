<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\Invoice;
use Square\Models\PublishInvoiceResponse;

/**
 * Builder for model PublishInvoiceResponse
 *
 * @see PublishInvoiceResponse
 */
class PublishInvoiceResponseBuilder
{
    /**
     * @var PublishInvoiceResponse
     */
    private $instance;

    private function __construct(PublishInvoiceResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Publish Invoice Response Builder object.
     */
    public static function init(): self
    {
        return new self(new PublishInvoiceResponse());
    }

    /**
     * Sets invoice field.
     *
     * @param Invoice|null $value
     */
    public function invoice(?Invoice $value): self
    {
        $this->instance->setInvoice($value);
        return $this;
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
     * Initializes a new Publish Invoice Response object.
     */
    public function build(): PublishInvoiceResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
