<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a collection of catalog objects for the purpose of applying a
 * `PricingRule`. Including a catalog object will include all of its subtypes.
 * For example, including a category in a product set will include all of its
 * items and associated item variations in the product set. Including an item in
 * a product set will also include its item variations.
 */
class CatalogProductSet implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string[]|null
     */
    private $productIdsAny;

    /**
     * @var string[]|null
     */
    private $productIdsAll;

    /**
     * @var int|null
     */
    private $quantityExact;

    /**
     * @var int|null
     */
    private $quantityMin;

    /**
     * @var int|null
     */
    private $quantityMax;

    /**
     * @var bool|null
     */
    private $allProducts;

    /**
     * Returns Name.
     *
     * User-defined name for the product set. For example, "Clearance Items"
     * or "Winter Sale Items".
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * User-defined name for the product set. For example, "Clearance Items"
     * or "Winter Sale Items".
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Product Ids Any.
     *
     * Unique IDs for any `CatalogObject` included in this product set. Any
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
     * @return string[]|null
     */
    public function getProductIdsAny(): ?array
    {
        return $this->productIdsAny;
    }

    /**
     * Sets Product Ids Any.
     *
     * Unique IDs for any `CatalogObject` included in this product set. Any
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
     * @maps product_ids_any
     *
     * @param string[]|null $productIdsAny
     */
    public function setProductIdsAny(?array $productIdsAny): void
    {
        $this->productIdsAny = $productIdsAny;
    }

    /**
     * Returns Product Ids All.
     *
     * Unique IDs for any `CatalogObject` included in this product set.
     * All objects in this set must be included in an order for a pricing rule to apply.
     *
     * Only one of `product_ids_all`, `product_ids_any`, or `all_products` can be set.
     *
     * Max: 500 catalog object IDs.
     *
     * @return string[]|null
     */
    public function getProductIdsAll(): ?array
    {
        return $this->productIdsAll;
    }

    /**
     * Sets Product Ids All.
     *
     * Unique IDs for any `CatalogObject` included in this product set.
     * All objects in this set must be included in an order for a pricing rule to apply.
     *
     * Only one of `product_ids_all`, `product_ids_any`, or `all_products` can be set.
     *
     * Max: 500 catalog object IDs.
     *
     * @maps product_ids_all
     *
     * @param string[]|null $productIdsAll
     */
    public function setProductIdsAll(?array $productIdsAll): void
    {
        $this->productIdsAll = $productIdsAll;
    }

    /**
     * Returns Quantity Exact.
     *
     * If set, there must be exactly this many items from `products_any` or `products_all`
     * in the cart for the discount to apply.
     *
     * Cannot be combined with either `quantity_min` or `quantity_max`.
     */
    public function getQuantityExact(): ?int
    {
        return $this->quantityExact;
    }

    /**
     * Sets Quantity Exact.
     *
     * If set, there must be exactly this many items from `products_any` or `products_all`
     * in the cart for the discount to apply.
     *
     * Cannot be combined with either `quantity_min` or `quantity_max`.
     *
     * @maps quantity_exact
     */
    public function setQuantityExact(?int $quantityExact): void
    {
        $this->quantityExact = $quantityExact;
    }

    /**
     * Returns Quantity Min.
     *
     * If set, there must be at least this many items from `products_any` or `products_all`
     * in a cart for the discount to apply. See `quantity_exact`. Defaults to 0 if
     * `quantity_exact`, `quantity_min` and `quantity_max` are all unspecified.
     */
    public function getQuantityMin(): ?int
    {
        return $this->quantityMin;
    }

    /**
     * Sets Quantity Min.
     *
     * If set, there must be at least this many items from `products_any` or `products_all`
     * in a cart for the discount to apply. See `quantity_exact`. Defaults to 0 if
     * `quantity_exact`, `quantity_min` and `quantity_max` are all unspecified.
     *
     * @maps quantity_min
     */
    public function setQuantityMin(?int $quantityMin): void
    {
        $this->quantityMin = $quantityMin;
    }

    /**
     * Returns Quantity Max.
     *
     * If set, the pricing rule will apply to a maximum of this many items from
     * `products_any` or `products_all`.
     */
    public function getQuantityMax(): ?int
    {
        return $this->quantityMax;
    }

    /**
     * Sets Quantity Max.
     *
     * If set, the pricing rule will apply to a maximum of this many items from
     * `products_any` or `products_all`.
     *
     * @maps quantity_max
     */
    public function setQuantityMax(?int $quantityMax): void
    {
        $this->quantityMax = $quantityMax;
    }

    /**
     * Returns All Products.
     *
     * If set to `true`, the product set will include every item in the catalog.
     * Only one of `product_ids_all`, `product_ids_any`, or `all_products` can be set.
     */
    public function getAllProducts(): ?bool
    {
        return $this->allProducts;
    }

    /**
     * Sets All Products.
     *
     * If set to `true`, the product set will include every item in the catalog.
     * Only one of `product_ids_all`, `product_ids_any`, or `all_products` can be set.
     *
     * @maps all_products
     */
    public function setAllProducts(?bool $allProducts): void
    {
        $this->allProducts = $allProducts;
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
            $json['name']            = $this->name;
        }
        if (isset($this->productIdsAny)) {
            $json['product_ids_any'] = $this->productIdsAny;
        }
        if (isset($this->productIdsAll)) {
            $json['product_ids_all'] = $this->productIdsAll;
        }
        if (isset($this->quantityExact)) {
            $json['quantity_exact']  = $this->quantityExact;
        }
        if (isset($this->quantityMin)) {
            $json['quantity_min']    = $this->quantityMin;
        }
        if (isset($this->quantityMax)) {
            $json['quantity_max']    = $this->quantityMax;
        }
        if (isset($this->allProducts)) {
            $json['all_products']    = $this->allProducts;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
