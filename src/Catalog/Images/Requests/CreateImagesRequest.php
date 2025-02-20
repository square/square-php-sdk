<?php

namespace Square\Catalog\Images\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\CreateCatalogImageRequest;
use Square\Core\Json\JsonProperty;
use Square\Utils\File;

class CreateImagesRequest extends JsonSerializableType
{
    /**
     * @var ?CreateCatalogImageRequest $request
     */
    #[JsonProperty('request')]
    private ?CreateCatalogImageRequest $request;

    /**
     * @var ?File $imageFile
     */
    private ?File $imageFile;

    /**
     * @param array{
     *   request?: ?CreateCatalogImageRequest,
     *   imageFile?: ?File,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->request = $values['request'] ?? null;
        $this->imageFile = $values['imageFile'] ?? null;
    }

    /**
     * @return ?CreateCatalogImageRequest
     */
    public function getRequest(): ?CreateCatalogImageRequest
    {
        return $this->request;
    }

    /**
     * @param ?CreateCatalogImageRequest $value
     */
    public function setRequest(?CreateCatalogImageRequest $value = null): self
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
