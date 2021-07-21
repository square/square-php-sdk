<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A modifier applicable to items at the time of sale.
 */
class CatalogModifier implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var Money|null
     */
    private $priceMoney;

    /**
     * @var int|null
     */
    private $ordinal;

    /**
     * @var string|null
     */
    private $modifierListId;

    /**
     * Returns Name.
     *
     * The modifier name.  This is a searchable attribute for use in applicable query filters, and its
     * value length is of Unicode code points.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The modifier name.  This is a searchable attribute for use in applicable query filters, and its
     * value length is of Unicode code points.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getPriceMoney(): ?Money
    {
        return $this->priceMoney;
    }

    /**
     * Sets Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps price_money
     */
    public function setPriceMoney(?Money $priceMoney): void
    {
        $this->priceMoney = $priceMoney;
    }

    /**
     * Returns Ordinal.
     *
     * Determines where this `CatalogModifier` appears in the `CatalogModifierList`.
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * Sets Ordinal.
     *
     * Determines where this `CatalogModifier` appears in the `CatalogModifierList`.
     *
     * @maps ordinal
     */
    public function setOrdinal(?int $ordinal): void
    {
        $this->ordinal = $ordinal;
    }

    /**
     * Returns Modifier List Id.
     *
     * The ID of the `CatalogModifierList` associated with this modifier.
     */
    public function getModifierListId(): ?string
    {
        return $this->modifierListId;
    }

    /**
     * Sets Modifier List Id.
     *
     * The ID of the `CatalogModifierList` associated with this modifier.
     *
     * @maps modifier_list_id
     */
    public function setModifierListId(?string $modifierListId): void
    {
        $this->modifierListId = $modifierListId;
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
            $json['name']             = $this->name;
        }
        if (isset($this->priceMoney)) {
            $json['price_money']      = $this->priceMoney;
        }
        if (isset($this->ordinal)) {
            $json['ordinal']          = $this->ordinal;
        }
        if (isset($this->modifierListId)) {
            $json['modifier_list_id'] = $this->modifierListId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
