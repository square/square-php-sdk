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
     * Returns Cursor.
     *
     * The pagination cursor returned in the previous response. Leave unset for an initial request.
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
     * An optional case-insensitive, comma-separated list of object types to retrieve, for example
     * `ITEM,ITEM_VARIATION,CATEGORY,IMAGE`.
     *
     * The legal values are taken from the CatalogObjectType enum:
     * `ITEM`, `ITEM_VARIATION`, `CATEGORY`, `DISCOUNT`, `TAX`,
     * `MODIFIER`, `MODIFIER_LIST`, or `IMAGE`.
     */
    public function getTypes(): ?string
    {
        return $this->types;
    }

    /**
     * Sets Types.
     *
     * An optional case-insensitive, comma-separated list of object types to retrieve, for example
     * `ITEM,ITEM_VARIATION,CATEGORY,IMAGE`.
     *
     * The legal values are taken from the CatalogObjectType enum:
     * `ITEM`, `ITEM_VARIATION`, `CATEGORY`, `DISCOUNT`, `TAX`,
     * `MODIFIER`, `MODIFIER_LIST`, or `IMAGE`.
     *
     * @maps types
     */
    public function setTypes(?string $types): void
    {
        $this->types = $types;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['cursor'] = $this->cursor;
        $json['types']  = $this->types;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
