<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

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
     * @var string[]|null
     */
    private $imageIds;

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
     * Returns Image Ids.
     *
     * The IDs of images associated with this `CatalogCategory` instance.
     * Currently these images are not displayed by Square, but are free to be displayed in 3rd party
     * applications.
     *
     * @return string[]|null
     */
    public function getImageIds(): ?array
    {
        return $this->imageIds;
    }

    /**
     * Sets Image Ids.
     *
     * The IDs of images associated with this `CatalogCategory` instance.
     * Currently these images are not displayed by Square, but are free to be displayed in 3rd party
     * applications.
     *
     * @maps image_ids
     *
     * @param string[]|null $imageIds
     */
    public function setImageIds(?array $imageIds): void
    {
        $this->imageIds = $imageIds;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->name)) {
            $json['name']      = $this->name;
        }
        if (isset($this->imageIds)) {
            $json['image_ids'] = $this->imageIds;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
