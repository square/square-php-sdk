<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class UpdateCatalogImageResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * The newly updated `CatalogImage` including a Square-generated
     * URL for the encapsulated image file.
     *
     * @var ?CatalogObject $image
     */
    #[JsonProperty('image')]
    private ?CatalogObject $image;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   image?: ?CatalogObject,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->image = $values['image'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?CatalogObject
     */
    public function getImage(): ?CatalogObject
    {
        return $this->image;
    }

    /**
     * @param ?CatalogObject $value
     */
    public function setImage(?CatalogObject $value = null): self
    {
        $this->image = $value;
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
