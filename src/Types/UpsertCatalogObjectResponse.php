<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class UpsertCatalogObjectResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?CatalogObject $catalogObject The successfully created or updated CatalogObject.
     */
    #[JsonProperty('catalog_object')]
    private ?CatalogObject $catalogObject;

    /**
     * @var ?array<CatalogIdMapping> $idMappings The mapping between client and server IDs for this upsert.
     */
    #[JsonProperty('id_mappings'), ArrayType([CatalogIdMapping::class])]
    private ?array $idMappings;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   catalogObject?: ?CatalogObject,
     *   idMappings?: ?array<CatalogIdMapping>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->catalogObject = $values['catalogObject'] ?? null;
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
     * @return ?CatalogObject
     */
    public function getCatalogObject(): ?CatalogObject
    {
        return $this->catalogObject;
    }

    /**
     * @param ?CatalogObject $value
     */
    public function setCatalogObject(?CatalogObject $value = null): self
    {
        $this->catalogObject = $value;
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
