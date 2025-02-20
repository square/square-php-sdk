<?php

namespace Square\Catalog\Images\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\UpdateCatalogImageRequest;
use Square\Core\Json\JsonProperty;
use Square\Utils\File;

class UpdateImagesRequest extends JsonSerializableType
{
    /**
     * @var string $imageId The ID of the `CatalogImage` object to update the encapsulated image file.
     */
    private string $imageId;

    /**
     * @var ?UpdateCatalogImageRequest $request
     */
    #[JsonProperty('request')]
    private ?UpdateCatalogImageRequest $request;

    /**
     * @var ?File $imageFile
     */
    private ?File $imageFile;

    /**
     * @param array{
     *   imageId: string,
     *   request?: ?UpdateCatalogImageRequest,
     *   imageFile?: ?File,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->imageId = $values['imageId'];
        $this->request = $values['request'] ?? null;
        $this->imageFile = $values['imageFile'] ?? null;
    }

    /**
     * @return string
     */
    public function getImageId(): string
    {
        return $this->imageId;
    }

    /**
     * @param string $value
     */
    public function setImageId(string $value): self
    {
        $this->imageId = $value;
        return $this;
    }

    /**
     * @return ?UpdateCatalogImageRequest
     */
    public function getRequest(): ?UpdateCatalogImageRequest
    {
        return $this->request;
    }

    /**
     * @param ?UpdateCatalogImageRequest $value
     */
    public function setRequest(?UpdateCatalogImageRequest $value = null): self
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
