<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a collection of catalog objects for the purpose of applying a
 * `PricingRule`. Including a catalog object will include all of its subtypes.
 * For example, including a category in a product set will include all of its
 * items and associated item variations in the product set. Including an item in
 * a product set will also include its item variations.
 */
class CatalogProductSet extends JsonSerializableType
{
    /**
     * User-defined name for the product set. For example, "Clearance Items"
     * or "Winter Sale Items".
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     *  Unique IDs for any `CatalogObject` included in this product set. Any
     * number of these catalog objects can be in an order for a pricing rule to apply.
     *
     * This can be used with `product_ids_all` in a parent `CatalogProductSet` to
     * match groups of products for a bulk discount, such as a discount for an
     * entree and side combo.
     *
     * Only one of `product_ids_all`, `product_ids_any`, or `all_products` can be set.
     *
     * Max: 500 catalog object IDs.
     *
     * @var ?array<string> $productIdsAny
     */
    #[JsonProperty('product_ids_any'), ArrayType(['string'])]
    private ?array $productIdsAny;

    /**
     * Unique IDs for any `CatalogObject` included in this product set.
     * All objects in this set must be included in an order for a pricing rule to apply.
     *
     * Only one of `product_ids_all`, `product_ids_any`, or `all_products` can be set.
     *
     * Max: 500 catalog object IDs.
     *
     * @var ?array<string> $productIdsAll
     */
    #[JsonProperty('product_ids_all'), ArrayType(['string'])]
    private ?array $productIdsAll;

    /**
     * If set, there must be exactly this many items from `products_any` or `products_all`
     * in the cart for the discount to apply.
     *
     * Cannot be combined with either `quantity_min` or `quantity_max`.
     *
     * @var ?int $quantityExact
     */
    #[JsonProperty('quantity_exact')]
    private ?int $quantityExact;

    /**
     * If set, there must be at least this many items from `products_any` or `products_all`
     * in a cart for the discount to apply. See `quantity_exact`. Defaults to 0 if
     * `quantity_exact`, `quantity_min` and `quantity_max` are all unspecified.
     *
     * @var ?int $quantityMin
     */
    #[JsonProperty('quantity_min')]
    private ?int $quantityMin;

    /**
     * If set, the pricing rule will apply to a maximum of this many items from
     * `products_any` or `products_all`.
     *
     * @var ?int $quantityMax
     */
    #[JsonProperty('quantity_max')]
    private ?int $quantityMax;

    /**
     * If set to `true`, the product set will include every item in the catalog.
     * Only one of `product_ids_all`, `product_ids_any`, or `all_products` can be set.
     *
     * @var ?bool $allProducts
     */
    #[JsonProperty('all_products')]
    private ?bool $allProducts;

    /**
     * @param array{
     *   name?: ?string,
     *   productIdsAny?: ?array<string>,
     *   productIdsAll?: ?array<string>,
     *   quantityExact?: ?int,
     *   quantityMin?: ?int,
     *   quantityMax?: ?int,
     *   allProducts?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->productIdsAny = $values['productIdsAny'] ?? null;
        $this->productIdsAll = $values['productIdsAll'] ?? null;
        $this->quantityExact = $values['quantityExact'] ?? null;
        $this->quantityMin = $values['quantityMin'] ?? null;
        $this->quantityMax = $values['quantityMax'] ?? null;
        $this->allProducts = $values['allProducts'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getProductIdsAny(): ?array
    {
        return $this->productIdsAny;
    }

    /**
     * @param ?array<string> $value
     */
    public function setProductIdsAny(?array $value = null): self
    {
        $this->productIdsAny = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getProductIdsAll(): ?array
    {
        return $this->productIdsAll;
    }

    /**
     * @param ?array<string> $value
     */
    public function setProductIdsAll(?array $value = null): self
    {
        $this->productIdsAll = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getQuantityExact(): ?int
    {
        return $this->quantityExact;
    }

    /**
     * @param ?int $value
     */
    public function setQuantityExact(?int $value = null): self
    {
        $this->quantityExact = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getQuantityMin(): ?int
    {
        return $this->quantityMin;
    }

    /**
     * @param ?int $value
     */
    public function setQuantityMin(?int $value = null): self
    {
        $this->quantityMin = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getQuantityMax(): ?int
    {
        return $this->quantityMax;
    }

    /**
     * @param ?int $value
     */
    public function setQuantityMax(?int $value = null): self
    {
        $this->quantityMax = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAllProducts(): ?bool
    {
        return $this->allProducts;
    }

    /**
     * @param ?bool $value
     */
    public function setAllProducts(?bool $value = null): self
    {
        $this->allProducts = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
