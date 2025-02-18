<?php

namespace Square\Invoices\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteInvoiceAttachmentRequest extends JsonSerializableType
{
    /**
     * @var string $invoiceId The ID of the [invoice](entity:Invoice) to delete the attachment from.
     */
    private string $invoiceId;

    /**
     * @var string $attachmentId The ID of the [attachment](entity:InvoiceAttachment) to delete.
     */
    private string $attachmentId;

    /**
     * @param array{
     *   invoiceId: string,
     *   attachmentId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->invoiceId = $values['invoiceId'];
        $this->attachmentId = $values['attachmentId'];
    }

    /**
     * @return string
     */
    public function getInvoiceId(): string
    {
        return $this->invoiceId;
    }

    /**
     * @param string $value
     */
    public function setInvoiceId(string $value): self
    {
        $this->invoiceId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttachmentId(): string
    {
        return $this->attachmentId;
    }

    /**
     * @param string $value
     */
    public function setAttachmentId(string $value): self
    {
        $this->attachmentId = $value;
        return $this;
    }
}
