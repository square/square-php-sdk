<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class SignatureOptions extends JsonSerializableType
{
    /**
     * @var string $title The title text to display in the signature capture flow on the Terminal.
     */
    #[JsonProperty('title')]
    private string $title;

    /**
     * @var string $body The body text to display in the signature capture flow on the Terminal.
     */
    #[JsonProperty('body')]
    private string $body;

    /**
     * @var ?array<SignatureImage> $signature An image representation of the collected signature.
     */
    #[JsonProperty('signature'), ArrayType([SignatureImage::class])]
    private ?array $signature;

    /**
     * @param array{
     *   title: string,
     *   body: string,
     *   signature?: ?array<SignatureImage>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
        $this->body = $values['body'];
        $this->signature = $values['signature'] ?? null;
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
     * @return ?array<SignatureImage>
     */
    public function getSignature(): ?array
    {
        return $this->signature;
    }

    /**
     * @param ?array<SignatureImage> $value
     */
    public function setSignature(?array $value = null): self
    {
        $this->signature = $value;
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
