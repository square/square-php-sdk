<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CreateInvoiceAttachmentRequest;

/**
 * Builder for model CreateInvoiceAttachmentRequest
 *
 * @see CreateInvoiceAttachmentRequest
 */
class CreateInvoiceAttachmentRequestBuilder
{
    /**
     * @var CreateInvoiceAttachmentRequest
     */
    private $instance;

    private function __construct(CreateInvoiceAttachmentRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new create invoice attachment request Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateInvoiceAttachmentRequest());
    }

    /**
     * Sets idempotency key field.
     */
    public function idempotencyKey(?string $value): self
    {
        $this->instance->setIdempotencyKey($value);
        return $this;
    }

    /**
     * Sets description field.
     */
    public function description(?string $value): self
    {
        $this->instance->setDescription($value);
        return $this;
    }

    /**
     * Initializes a new create invoice attachment request object.
     */
    public function build(): CreateInvoiceAttachmentRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
