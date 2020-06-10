<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A category to which a `CatalogItem` belongs in the `Catalog` object model.
 */
class CatalogCategory implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * Returns Name.
     *
     * The category name. Searchable. This field has max length of 255 Unicode code points.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The category name. Searchable. This field has max length of 255 Unicode code points.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['name'] = $this->name;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
