<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchGetCatalogObjectsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<CatalogObject> $objects A list of [CatalogObject](entity:CatalogObject)s returned.
     */
    #[JsonProperty('objects'), ArrayType([CatalogObject::class])]
    private ?array $objects;

    /**
     * @var ?array<CatalogObject> $relatedObjects A list of [CatalogObject](entity:CatalogObject)s referenced by the object in the `objects` field.
     */
    #[JsonProperty('related_objects'), ArrayType([CatalogObject::class])]
    private ?array $relatedObjects;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   objects?: ?array<CatalogObject>,
     *   relatedObjects?: ?array<CatalogObject>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->objects = $values['objects'] ?? null;
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
     * @return ?array<CatalogObject>
     */
    public function getObjects(): ?array
    {
        return $this->objects;
    }

    /**
     * @param ?array<CatalogObject> $value
     */
    public function setObjects(?array $value = null): self
    {
        $this->objects = $value;
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
