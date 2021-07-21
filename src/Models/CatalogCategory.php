<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A category to which a `CatalogItem` instance belongs.
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
     * The category name. This is a searchable attribute for use in applicable query filters, and its value
     * length is of Unicode code points.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The category name. This is a searchable attribute for use in applicable query filters, and its value
     * length is of Unicode code points.
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
        if (isset($this->name)) {
            $json['name'] = $this->name;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
