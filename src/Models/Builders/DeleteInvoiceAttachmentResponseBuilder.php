<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeleteInvoiceAttachmentResponse;

/**
 * Builder for model DeleteInvoiceAttachmentResponse
 *
 * @see DeleteInvoiceAttachmentResponse
 */
class DeleteInvoiceAttachmentResponseBuilder
{
    /**
     * @var DeleteInvoiceAttachmentResponse
     */
    private $instance;

    private function __construct(DeleteInvoiceAttachmentResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new delete invoice attachment response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteInvoiceAttachmentResponse());
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
     * Initializes a new delete invoice attachment response object.
     */
    public function build(): DeleteInvoiceAttachmentResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
