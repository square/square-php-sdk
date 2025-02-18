<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A file to be uploaded as dispute evidence.
 */
class DisputeEvidenceFile extends JsonSerializableType
{
    /**
     * @var ?string $filename The file name including the file extension. For example: "receipt.tiff".
     */
    #[JsonProperty('filename')]
    private ?string $filename;

    /**
     * @var ?string $filetype Dispute evidence files must be application/pdf, image/heic, image/heif, image/jpeg, image/png, or image/tiff formats.
     */
    #[JsonProperty('filetype')]
    private ?string $filetype;

    /**
     * @param array{
     *   filename?: ?string,
     *   filetype?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filename = $values['filename'] ?? null;
        $this->filetype = $values['filetype'] ?? null;
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
    public function getFiletype(): ?string
    {
        return $this->filetype;
    }

    /**
     * @param ?string $value
     */
    public function setFiletype(?string $value = null): self
    {
        $this->filetype = $value;
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
