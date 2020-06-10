<?php

declare(strict_types=1);

namespace Square\Models;

class CreateCatalogImageResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var CatalogObject|null
     */
    private $image;

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
     * Returns Image.
     */
    public function getImage(): ?CatalogObject
    {
        return $this->image;
    }

    /**
     * Sets Image.
     *
     * @maps image
     */
    public function setImage(?CatalogObject $image): void
    {
        $this->image = $image;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['errors'] = $this->errors;
        $json['image']  = $this->image;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
