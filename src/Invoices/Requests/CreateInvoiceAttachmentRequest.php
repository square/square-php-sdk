<?php

namespace Square\Invoices\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\CreateInvoiceAttachmentRequestData;
use Square\Core\Json\JsonProperty;
use Square\Utils\File;

class CreateInvoiceAttachmentRequest extends JsonSerializableType
{
    /**
     * @var string $invoiceId The ID of the [invoice](entity:Invoice) to attach the file to.
     */
    private string $invoiceId;

    /**
     * @var ?CreateInvoiceAttachmentRequestData $request
     */
    #[JsonProperty('request')]
    private ?CreateInvoiceAttachmentRequestData $request;

    /**
     * @var ?File $imageFile
     */
    private ?File $imageFile;

    /**
     * @param array{
     *   invoiceId: string,
     *   request?: ?CreateInvoiceAttachmentRequestData,
     *   imageFile?: ?File,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->invoiceId = $values['invoiceId'];
        $this->request = $values['request'] ?? null;
        $this->imageFile = $values['imageFile'] ?? null;
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
     * @return ?CreateInvoiceAttachmentRequestData
     */
    public function getRequest(): ?CreateInvoiceAttachmentRequestData
    {
        return $this->request;
    }

    /**
     * @param ?CreateInvoiceAttachmentRequestData $value
     */
    public function setRequest(?CreateInvoiceAttachmentRequestData $value = null): self
    {
        $this->request = $value;
        return $this;
    }

    /**
     * @return ?File
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param ?File $value
     */
    public function setImageFile(?File $value = null): self
    {
        $this->imageFile = $value;
        return $this;
    }
}
