<?php

declare(strict_types=1);

namespace Square\Models;

class RetrieveCatalogObjectResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var CatalogObject|null
     */
    private $object;

    /**
     * @var CatalogObject[]|null
     */
    private $relatedObjects;

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
     * Returns Object.
     */
    public function getObject(): ?CatalogObject
    {
        return $this->object;
    }

    /**
     * Sets Object.
     *
     * @maps object
     */
    public function setObject(?CatalogObject $object): void
    {
        $this->object = $object;
    }

    /**
     * Returns Related Objects.
     *
     * A list of CatalogObjects referenced by the object in the `object` field.
     *
     * @return CatalogObject[]|null
     */
    public function getRelatedObjects(): ?array
    {
        return $this->relatedObjects;
    }

    /**
     * Sets Related Objects.
     *
     * A list of CatalogObjects referenced by the object in the `object` field.
     *
     * @maps related_objects
     *
     * @param CatalogObject[]|null $relatedObjects
     */
    public function setRelatedObjects(?array $relatedObjects): void
    {
        $this->relatedObjects = $relatedObjects;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['errors']         = $this->errors;
        $json['object']         = $this->object;
        $json['related_objects'] = $this->relatedObjects;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
