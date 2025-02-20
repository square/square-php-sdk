<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a file attached to an [invoice](entity:Invoice).
 */
class InvoiceAttachment extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-assigned ID of the attachment.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $filename The file name of the attachment, which is displayed on the invoice.
     */
    #[JsonProperty('filename')]
    private ?string $filename;

    /**
     * The description of the attachment, which is displayed on the invoice.
     * This field maps to the seller-defined **Message** field.
     *
     * @var ?string $description
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?int $filesize The file size of the attachment in bytes.
     */
    #[JsonProperty('filesize')]
    private ?int $filesize;

    /**
     * @var ?string $hash The MD5 hash that was generated from the file contents.
     */
    #[JsonProperty('hash')]
    private ?string $hash;

    /**
     * The mime type of the attachment.
     * The following mime types are supported:
     * image/gif, image/jpeg, image/png, image/tiff, image/bmp, application/pdf.
     *
     * @var ?string $mimeType
     */
    #[JsonProperty('mime_type')]
    private ?string $mimeType;

    /**
     * @var ?string $uploadedAt The timestamp when the attachment was uploaded, in RFC 3339 format.
     */
    #[JsonProperty('uploaded_at')]
    private ?string $uploadedAt;

    /**
     * @param array{
     *   id?: ?string,
     *   filename?: ?string,
     *   description?: ?string,
     *   filesize?: ?int,
     *   hash?: ?string,
     *   mimeType?: ?string,
     *   uploadedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->filename = $values['filename'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->filesize = $values['filesize'] ?? null;
        $this->hash = $values['hash'] ?? null;
        $this->mimeType = $values['mimeType'] ?? null;
        $this->uploadedAt = $values['uploadedAt'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param ?string $value
     */
    public function setFilename(?string $value = null): self
    {
        $this->filename = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFilesize(): ?int
    {
        return $this->filesize;
    }

    /**
     * @param ?int $value
     */
    public function setFilesize(?int $value = null): self
    {
        $this->filesize = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getHash(): ?string
    {
        return $this->hash;
    }

    /**
     * @param ?string $value
     */
    public function setHash(?string $value = null): self
    {
        $this->hash = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    /**
     * @param ?string $value
     */
    public function setMimeType(?string $value = null): self
    {
        $this->mimeType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUploadedAt(): ?string
    {
        return $this->uploadedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUploadedAt(?string $value = null): self
    {
        $this->uploadedAt = $value;
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
