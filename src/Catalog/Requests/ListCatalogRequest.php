<?php

namespace Square\Catalog\Requests;

use Square\Core\Json\JsonSerializableType;

class ListCatalogRequest extends JsonSerializableType
{
    /**
     * The pagination cursor returned in the previous response. Leave unset for an initial request.
     * The page size is currently set to be 100.
     * See [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination) for more information.
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * An optional case-insensitive, comma-separated list of object types to retrieve.
     *
     * The valid values are defined in the [CatalogObjectType](entity:CatalogObjectType) enum, for example,
     * `ITEM`, `ITEM_VARIATION`, `CATEGORY`, `DISCOUNT`, `TAX`,
     * `MODIFIER`, `MODIFIER_LIST`, `IMAGE`, etc.
     *
     * If this is unspecified, the operation returns objects of all the top level types at the version
     * of the Square API used to make the request. Object types that are nested onto other object types
     * are not included in the defaults.
     *
     * At the current API version the default object types are:
     * ITEM, CATEGORY, TAX, DISCOUNT, MODIFIER_LIST,
     * PRICING_RULE, PRODUCT_SET, TIME_PERIOD, MEASUREMENT_UNIT,
     * SUBSCRIPTION_PLAN, ITEM_OPTION, CUSTOM_ATTRIBUTE_DEFINITION, QUICK_AMOUNT_SETTINGS.
     *
     * @var ?string $types
     */
    private ?string $types;

    /**
     * The specific version of the catalog objects to be included in the response.
     * This allows you to retrieve historical versions of objects. The specified version value is matched against
     * the [CatalogObject](entity:CatalogObject)s' `version` attribute.  If not included, results will be from the
     * current version of the catalog.
     *
     * @var ?int $catalogVersion
     */
    private ?int $catalogVersion;

    /**
     * @param array{
     *   cursor?: ?string,
     *   types?: ?string,
     *   catalogVersion?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->types = $values['types'] ?? null;
        $this->catalogVersion = $values['catalogVersion'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTypes(): ?string
    {
        return $this->types;
    }

    /**
     * @param ?string $value
     */
    public function setTypes(?string $value = null): self
    {
        $this->types = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCatalogVersion(): ?int
    {
        return $this->catalogVersion;
    }

    /**
     * @param ?int $value
     */
    public function setCatalogVersion(?int $value = null): self
    {
        $this->catalogVersion = $value;
        return $this;
    }
}
