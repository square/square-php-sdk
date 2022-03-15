<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

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
     * The valid values are defined in the [CatalogObjectType]($m/CatalogObjectType) enum, for example,
     * `ITEM`, `ITEM_VARIATION`, `CATEGORY`, `DISCOUNT`, `TAX`,
     * `MODIFIER`, `MODIFIER_LIST`, `IMAGE`, etc.
     *
     * If this is unspecified, the operation returns objects of all the top level types at the version
     * of the Square API used to make the request. Object types that are nested onto other object types
     * are not included in the defaults.
     *
     * At the current API version the default object types are:
     * ITEM, CATEGORY, TAX, DISCOUNT, MODIFIER_LIST, DINING_OPTION, TAX_EXEMPTION,
     * SERVICE_CHARGE, PRICING_RULE, PRODUCT_SET, TIME_PERIOD, MEASUREMENT_UNIT,
     * SUBSCRIPTION_PLAN, ITEM_OPTION, CUSTOM_ATTRIBUTE_DEFINITION, QUICK_AMOUNT_SETTINGS.
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
     * The valid values are defined in the [CatalogObjectType]($m/CatalogObjectType) enum, for example,
     * `ITEM`, `ITEM_VARIATION`, `CATEGORY`, `DISCOUNT`, `TAX`,
     * `MODIFIER`, `MODIFIER_LIST`, `IMAGE`, etc.
     *
     * If this is unspecified, the operation returns objects of all the top level types at the version
     * of the Square API used to make the request. Object types that are nested onto other object types
     * are not included in the defaults.
     *
     * At the current API version the default object types are:
     * ITEM, CATEGORY, TAX, DISCOUNT, MODIFIER_LIST, DINING_OPTION, TAX_EXEMPTION,
     * SERVICE_CHARGE, PRICING_RULE, PRODUCT_SET, TIME_PERIOD, MEASUREMENT_UNIT,
     * SUBSCRIPTION_PLAN, ITEM_OPTION, CUSTOM_ATTRIBUTE_DEFINITION, QUICK_AMOUNT_SETTINGS.
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
     * the [CatalogObject]($m/CatalogObject)s' `version` attribute.  If not included, results will
     * be from the current version of the catalog.
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
     * the [CatalogObject]($m/CatalogObject)s' `version` attribute.  If not included, results will
     * be from the current version of the catalog.
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
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
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
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
