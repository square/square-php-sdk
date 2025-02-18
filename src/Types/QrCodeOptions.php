<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Fields to describe the action that displays QR-Codes.
 */
class QrCodeOptions extends JsonSerializableType
{
    /**
     * @var string $title The title text to display in the QR code flow on the Terminal.
     */
    #[JsonProperty('title')]
    private string $title;

    /**
     * @var string $body The body text to display in the QR code flow on the Terminal.
     */
    #[JsonProperty('body')]
    private string $body;

    /**
     * The text representation of the data to show in the QR code
     * as UTF8-encoded data.
     *
     * @var string $barcodeContents
     */
    #[JsonProperty('barcode_contents')]
    private string $barcodeContents;

    /**
     * @param array{
     *   title: string,
     *   body: string,
     *   barcodeContents: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
        $this->body = $values['body'];
        $this->barcodeContents = $values['barcodeContents'];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $value
     */
    public function setTitle(string $value): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $value
     */
    public function setBody(string $value): self
    {
        $this->body = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBarcodeContents(): string
    {
        return $this->barcodeContents;
    }

    /**
     * @param string $value
     */
    public function setBarcodeContents(string $value): self
    {
        $this->barcodeContents = $value;
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
