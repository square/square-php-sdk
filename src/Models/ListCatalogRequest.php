<?php

declare(strict_types=1);

namespace Square\Models;

class ListCatalogRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var string|null
     */
    private $types;

    /**
     * @var int|null
     */
    private $catalogVersion;

    /**
     * Returns Cursor.
     *
     * The pagination cursor returned in the previous response. Leave unset for an initial request.
     * The page size is currently set to be 100.
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The pagination cursor returned in the previous response. Leave unset for an initial request.
     * The page size is currently set to be 100.
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Types.
     *
     * An optional case-insensitive, comma-separated list of object types to retrieve.
     *
     * The valid values are defined in the [CatalogObjectType]($m/CatalogObjectType) enum, including
     * `ITEM`, `ITEM_VARIATION`, `CATEGORY`, `DISCOUNT`, `TAX`,
     * `MODIFIER`, `MODIFIER_LIST`, or `IMAGE`.
     *
     * If this is unspecified, the operation returns objects of all the types at the version of the Square
     * API used to make the request.
     */
    public function getTypes(): ?string
    {
        return $this->types;
    }

    /**
     * Sets Types.
     *
     * An optional case-insensitive, comma-separated list of object types to retrieve.
     *
     * The valid values are defined in the [CatalogObjectType]($m/CatalogObjectType) enum, including
     * `ITEM`, `ITEM_VARIATION`, `CATEGORY`, `DISCOUNT`, `TAX`,
     * `MODIFIER`, `MODIFIER_LIST`, or `IMAGE`.
     *
     * If this is unspecified, the operation returns objects of all the types at the version of the Square
     * API used to make the request.
     *
     * @maps types
     */
    public function setTypes(?string $types): void
    {
        $this->types = $types;
    }

    /**
     * Returns Catalog Version.
     *
     * The specific version of the catalog objects to be included in the response.
     * This allows you to retrieve historical
     * versions of objects. The specified version value is matched against
     * the [CatalogObject]($m/CatalogObject)s' `version` attribute.
     */
    public function getCatalogVersion(): ?int
    {
        return $this->catalogVersion;
    }

    /**
     * Sets Catalog Version.
     *
     * The specific version of the catalog objects to be included in the response.
     * This allows you to retrieve historical
     * versions of objects. The specified version value is matched against
     * the [CatalogObject]($m/CatalogObject)s' `version` attribute.
     *
     * @maps catalog_version
     */
    public function setCatalogVersion(?int $catalogVersion): void
    {
        $this->catalogVersion = $catalogVersion;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->cursor)) {
            $json['cursor']          = $this->cursor;
        }
        if (isset($this->types)) {
            $json['types']           = $this->types;
        }
        if (isset($this->catalogVersion)) {
            $json['catalog_version'] = $this->catalogVersion;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
