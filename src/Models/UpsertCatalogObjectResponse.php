<?php

declare(strict_types=1);

namespace Square\Models;

class UpsertCatalogObjectResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var CatalogObject|null
     */
    private $catalogObject;

    /**
     * @var CatalogIdMapping[]|null
     */
    private $idMappings;

    /**
     * Returns Errors.
     *
     * Information on any errors encountered.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Information on any errors encountered.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Catalog Object.
     */
    public function getCatalogObject(): ?CatalogObject
    {
        return $this->catalogObject;
    }

    /**
     * Sets Catalog Object.
     *
     * @maps catalog_object
     */
    public function setCatalogObject(?CatalogObject $catalogObject): void
    {
        $this->catalogObject = $catalogObject;
    }

    /**
     * Returns Id Mappings.
     *
     * The mapping between client and server IDs for this upsert.
     *
     * @return CatalogIdMapping[]|null
     */
    public function getIdMappings(): ?array
    {
        return $this->idMappings;
    }

    /**
     * Sets Id Mappings.
     *
     * The mapping between client and server IDs for this upsert.
     *
     * @maps id_mappings
     *
     * @param CatalogIdMapping[]|null $idMappings
     */
    public function setIdMappings(?array $idMappings): void
    {
        $this->idMappings = $idMappings;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['errors']        = $this->errors;
        $json['catalog_object'] = $this->catalogObject;
        $json['id_mappings']   = $this->idMappings;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
