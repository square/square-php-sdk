<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchUpsertCatalogObjectsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<CatalogObject> $objects The created successfully created CatalogObjects.
     */
    #[JsonProperty('objects'), ArrayType([CatalogObject::class])]
    private ?array $objects;

    /**
     * @var ?string $updatedAt The database [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates) of this update in RFC 3339 format, e.g., "2016-09-04T23:59:33.123Z".
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?array<CatalogIdMapping> $idMappings The mapping between client and server IDs for this upsert.
     */
    #[JsonProperty('id_mappings'), ArrayType([CatalogIdMapping::class])]
    private ?array $idMappings;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   objects?: ?array<CatalogObject>,
     *   updatedAt?: ?string,
     *   idMappings?: ?array<CatalogIdMapping>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->objects = $values['objects'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->idMappings = $values['idMappings'] ?? null;
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
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogIdMapping>
     */
    public function getIdMappings(): ?array
    {
        return $this->idMappings;
    }

    /**
     * @param ?array<CatalogIdMapping> $value
     */
    public function setIdMappings(?array $value = null): self
    {
        $this->idMappings = $value;
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
