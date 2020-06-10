<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A line item modifier being returned.
 */
class OrderReturnLineItemModifier implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string|null
     */
    private $sourceModifierUid;

    /**
     * @var string|null
     */
    private $catalogObjectId;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var Money|null
     */
    private $basePriceMoney;

    /**
     * @var Money|null
     */
    private $totalPriceMoney;

    /**
     * Returns Uid.
     *
     * Unique ID that identifies the return modifier only within this order.
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * Unique ID that identifies the return modifier only within this order.
     *
     * @maps uid
     */
    public function setUid(?string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * Returns Source Modifier Uid.
     *
     * `uid` of the Modifier from the LineItem from the Order which contains the
     * original sale of this line item modifier.
     */
    public function getSourceModifierUid(): ?string
    {
        return $this->sourceModifierUid;
    }

    /**
     * Sets Source Modifier Uid.
     *
     * `uid` of the Modifier from the LineItem from the Order which contains the
     * original sale of this line item modifier.
     *
     * @maps source_modifier_uid
     */
    public function setSourceModifierUid(?string $sourceModifierUid): void
    {
        $this->sourceModifierUid = $sourceModifierUid;
    }

    /**
     * Returns Catalog Object Id.
     *
     * The catalog object id referencing [CatalogModifier](#type-catalogmodifier).
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The catalog object id referencing [CatalogModifier](#type-catalogmodifier).
     *
     * @maps catalog_object_id
     */
    public function setCatalogObjectId(?string $catalogObjectId): void
    {
        $this->catalogObjectId = $catalogObjectId;
    }

    /**
     * Returns Name.
     *
     * The name of the item modifier.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the item modifier.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Base Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getBasePriceMoney(): ?Money
    {
        return $this->basePriceMoney;
    }

    /**
     * Sets Base Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps base_price_money
     */
    public function setBasePriceMoney(?Money $basePriceMoney): void
    {
        $this->basePriceMoney = $basePriceMoney;
    }

    /**
     * Returns Total Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalPriceMoney(): ?Money
    {
        return $this->totalPriceMoney;
    }

    /**
     * Sets Total Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_price_money
     */
    public function setTotalPriceMoney(?Money $totalPriceMoney): void
    {
        $this->totalPriceMoney = $totalPriceMoney;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['uid']               = $this->uid;
        $json['source_modifier_uid'] = $this->sourceModifierUid;
        $json['catalog_object_id'] = $this->catalogObjectId;
        $json['name']              = $this->name;
        $json['base_price_money']  = $this->basePriceMoney;
        $json['total_price_money'] = $this->totalPriceMoney;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
