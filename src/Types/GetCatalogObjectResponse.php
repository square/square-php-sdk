<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class GetCatalogObjectResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?CatalogObject $object The `CatalogObject`s returned.
     */
    #[JsonProperty('object')]
    private ?CatalogObject $object;

    /**
     * @var ?array<CatalogObject> $relatedObjects A list of `CatalogObject`s referenced by the object in the `object` field.
     */
    #[JsonProperty('related_objects'), ArrayType([CatalogObject::class])]
    private ?array $relatedObjects;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   object?: ?CatalogObject,
     *   relatedObjects?: ?array<CatalogObject>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->object = $values['object'] ?? null;
        $this->relatedObjects = $values['relatedObjects'] ?? null;
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
    public function getObject(): ?CatalogObject
    {
        return $this->object;
    }

    /**
     * @param ?CatalogObject $value
     */
    public function setObject(?CatalogObject $value = null): self
    {
        $this->object = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogObject>
     */
    public function getRelatedObjects(): ?array
    {
        return $this->relatedObjects;
    }

    /**
     * @param ?array<CatalogObject> $value
     */
    public function setRelatedObjects(?array $value = null): self
    {
        $this->relatedObjects = $value;
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
