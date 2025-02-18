<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class SignatureImage extends JsonSerializableType
{
    /**
     * The mime/type of the image data.
     * Use `image/png;base64` for png.
     *
     * @var ?string $imageType
     */
    #[JsonProperty('image_type')]
    private ?string $imageType;

    /**
     * @var ?string $data The base64 representation of the image.
     */
    #[JsonProperty('data')]
    private ?string $data;

    /**
     * @param array{
     *   imageType?: ?string,
     *   data?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->imageType = $values['imageType'] ?? null;
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getImageType(): ?string
    {
        return $this->imageType;
    }

    /**
     * @param ?string $value
     */
    public function setImageType(?string $value = null): self
    {
        $this->imageType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param ?string $value
     */
    public function setData(?string $value = null): self
    {
        $this->data = $value;
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
