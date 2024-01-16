<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CreateInvoiceAttachmentResponse;
use Square\Models\InvoiceAttachment;

/**
 * Builder for model CreateInvoiceAttachmentResponse
 *
 * @see CreateInvoiceAttachmentResponse
 */
class CreateInvoiceAttachmentResponseBuilder
{
    /**
     * @var CreateInvoiceAttachmentResponse
     */
    private $instance;

    private function __construct(CreateInvoiceAttachmentResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new create invoice attachment response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateInvoiceAttachmentResponse());
    }

    /**
     * Sets attachment field.
     */
    public function attachment(?InvoiceAttachment $value): self
    {
        $this->instance->setAttachment($value);
        return $this;
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new create invoice attachment response object.
     */
    public function build(): CreateInvoiceAttachmentResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
