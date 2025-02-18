<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A line item modifier being returned.
 */
class OrderReturnLineItemModifier extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID that identifies the return modifier only within this order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * The modifier `uid` from the order's line item that contains the
     * original sale of this line item modifier.
     *
     * @var ?string $sourceModifierUid
     */
    #[JsonProperty('source_modifier_uid')]
    private ?string $sourceModifierUid;

    /**
     * @var ?string $catalogObjectId The catalog object ID referencing [CatalogModifier](entity:CatalogModifier).
     */
    #[JsonProperty('catalog_object_id')]
    private ?string $catalogObjectId;

    /**
     * @var ?int $catalogVersion The version of the catalog object that this line item modifier references.
     */
    #[JsonProperty('catalog_version')]
    private ?int $catalogVersion;

    /**
     * @var ?string $name The name of the item modifier.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * The base price for the modifier.
     *
     * `base_price_money` is required for ad hoc modifiers.
     * If both `catalog_object_id` and `base_price_money` are set, `base_price_money` overrides the predefined [CatalogModifier](entity:CatalogModifier) price.
     *
     * @var ?Money $basePriceMoney
     */
    #[JsonProperty('base_price_money')]
    private ?Money $basePriceMoney;

    /**
     * The total price of the item modifier for its line item.
     * This is the modifier's `base_price_money` multiplied by the line item's quantity.
     *
     * @var ?Money $totalPriceMoney
     */
    #[JsonProperty('total_price_money')]
    private ?Money $totalPriceMoney;

    /**
     * The quantity of the line item modifier. The modifier quantity can be 0 or more.
     * For example, suppose a restaurant offers a cheeseburger on the menu. When a buyer orders
     * this item, the restaurant records the purchase by creating an `Order` object with a line item
     * for a burger. The line item includes a line item modifier: the name is cheese and the quantity
     * is 1. The buyer has the option to order extra cheese (or no cheese). If the buyer chooses
     * the extra cheese option, the modifier quantity increases to 2. If the buyer does not want
     * any cheese, the modifier quantity is set to 0.
     *
     * @var ?string $quantity
     */
    #[JsonProperty('quantity')]
    private ?string $quantity;

    /**
     * @param array{
     *   uid?: ?string,
     *   sourceModifierUid?: ?string,
     *   catalogObjectId?: ?string,
     *   catalogVersion?: ?int,
     *   name?: ?string,
     *   basePriceMoney?: ?Money,
     *   totalPriceMoney?: ?Money,
     *   quantity?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->sourceModifierUid = $values['sourceModifierUid'] ?? null;
        $this->catalogObjectId = $values['catalogObjectId'] ?? null;
        $this->catalogVersion = $values['catalogVersion'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->basePriceMoney = $values['basePriceMoney'] ?? null;
        $this->totalPriceMoney = $values['totalPriceMoney'] ?? null;
        $this->quantity = $values['quantity'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param ?string $value
     */
    public function setUid(?string $value = null): self
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSourceModifierUid(): ?string
    {
        return $this->sourceModifierUid;
    }

    /**
     * @param ?string $value
     */
    public function setSourceModifierUid(?string $value = null): self
    {
        $this->sourceModifierUid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * @param ?string $value
     */
    public function setCatalogObjectId(?string $value = null): self
    {
        $this->catalogObjectId = $value;
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
     * @return ?Money
     */
    public function getBasePriceMoney(): ?Money
    {
        return $this->basePriceMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setBasePriceMoney(?Money $value = null): self
    {
        $this->basePriceMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getTotalPriceMoney(): ?Money
    {
        return $this->totalPriceMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTotalPriceMoney(?Money $value = null): self
    {
        $this->totalPriceMoney = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    /**
     * @param ?string $value
     */
    public function setQuantity(?string $value = null): self
    {
        $this->quantity = $value;
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
