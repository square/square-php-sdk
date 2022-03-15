<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * A file to be uploaded as dispute evidence.
 */
class DisputeEvidenceFile implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $filename;

    /**
     * @var string|null
     */
    private $filetype;

    /**
     * Returns Filename.
     *
     * The file name including the file extension. For example: "receipt.tiff".
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * Sets Filename.
     *
     * The file name including the file extension. For example: "receipt.tiff".
     *
     * @maps filename
     */
    public function setFilename(?string $filename): void
    {
        $this->filename = $filename;
    }

    /**
     * Returns Filetype.
     *
     * Dispute evidence files must be application/pdf, image/heic, image/heif, image/jpeg, image/png, or
     * image/tiff formats.
     */
    public function getFiletype(): ?string
    {
        return $this->filetype;
    }

    /**
     * Sets Filetype.
     *
     * Dispute evidence files must be application/pdf, image/heic, image/heif, image/jpeg, image/png, or
     * image/tiff formats.
     *
     * @maps filetype
     */
    public function setFiletype(?string $filetype): void
    {
        $this->filetype = $filetype;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->filename)) {
            $json['filename'] = $this->filename;
        }
        if (isset($this->filetype)) {
            $json['filetype'] = $this->filetype;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
