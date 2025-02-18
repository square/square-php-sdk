<?php

namespace Square\Invoices\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Utils\File;

class CreateInvoiceAttachmentRequest extends JsonSerializableType
{
    /**
     * @var string $invoiceId The ID of the [invoice](entity:Invoice) to attach the file to.
     */
    private string $invoiceId;

    /**
     * @var mixed $request
     */
    #[JsonProperty('request')]
    private mixed $request;

    /**
     * @var ?File $imageFile
     */
    private ?File $imageFile;

    /**
     * @param array{
     *   invoiceId: string,
     *   request?: mixed,
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
     * @return mixed
     */
    public function getRequest(): mixed
    {
        return $this->request;
    }

    /**
     * @param mixed $value
     */
    public function setRequest(mixed $value = null): self
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
