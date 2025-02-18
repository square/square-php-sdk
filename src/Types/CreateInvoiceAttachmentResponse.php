<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [CreateInvoiceAttachment](api-endpoint:Invoices-CreateInvoiceAttachment) response.
 */
class CreateInvoiceAttachmentResponse extends JsonSerializableType
{
    /**
     * @var ?InvoiceAttachment $attachment Metadata about the attachment that was added to the invoice.
     */
    #[JsonProperty('attachment')]
    private ?InvoiceAttachment $attachment;

    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   attachment?: ?InvoiceAttachment,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attachment = $values['attachment'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?InvoiceAttachment
     */
    public function getAttachment(): ?InvoiceAttachment
    {
        return $this->attachment;
    }

    /**
     * @param ?InvoiceAttachment $value
     */
    public function setAttachment(?InvoiceAttachment $value = null): self
    {
        $this->attachment = $value;
        return $this;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
