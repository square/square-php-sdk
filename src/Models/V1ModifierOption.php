<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1ModifierOption
 */
class V1ModifierOption implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var V1Money|null
     */
    private $priceMoney;

    /**
     * @var bool|null
     */
    private $onByDefault;

    /**
     * @var int|null
     */
    private $ordinal;

    /**
     * @var string|null
     */
    private $modifierListId;

    /**
     * @var string|null
     */
    private $v2Id;

    /**
     * Returns Id.
     *
     * The modifier option's unique ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The modifier option's unique ID.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Name.
     *
     * The modifier option's name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The modifier option's name.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Price Money.
     */
    public function getPriceMoney(): ?V1Money
    {
        return $this->priceMoney;
    }

    /**
     * Sets Price Money.
     *
     * @maps price_money
     */
    public function setPriceMoney(?V1Money $priceMoney): void
    {
        $this->priceMoney = $priceMoney;
    }

    /**
     * Returns On by Default.
     *
     * If true, the modifier option is the default option in a modifier list for which selection_type is
     * SINGLE.
     */
    public function getOnByDefault(): ?bool
    {
        return $this->onByDefault;
    }

    /**
     * Sets On by Default.
     *
     * If true, the modifier option is the default option in a modifier list for which selection_type is
     * SINGLE.
     *
     * @maps on_by_default
     */
    public function setOnByDefault(?bool $onByDefault): void
    {
        $this->onByDefault = $onByDefault;
    }

    /**
     * Returns Ordinal.
     *
     * Indicates the modifier option's list position when displayed in Square Point of Sale and the
     * merchant dashboard. If more than one modifier option in the same modifier list has the same ordinal
     * value, those options are displayed in alphabetical order.
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * Sets Ordinal.
     *
     * Indicates the modifier option's list position when displayed in Square Point of Sale and the
     * merchant dashboard. If more than one modifier option in the same modifier list has the same ordinal
     * value, those options are displayed in alphabetical order.
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
     * The ID of the modifier list the option belongs to.
     */
    public function getModifierListId(): ?string
    {
        return $this->modifierListId;
    }

    /**
     * Sets Modifier List Id.
     *
     * The ID of the modifier list the option belongs to.
     *
     * @maps modifier_list_id
     */
    public function setModifierListId(?string $modifierListId): void
    {
        $this->modifierListId = $modifierListId;
    }

    /**
     * Returns V 2 Id.
     *
     * The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations
     * share the same v2 ID.
     */
    public function getV2Id(): ?string
    {
        return $this->v2Id;
    }

    /**
     * Sets V 2 Id.
     *
     * The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations
     * share the same v2 ID.
     *
     * @maps v2_id
     */
    public function setV2Id(?string $v2Id): void
    {
        $this->v2Id = $v2Id;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']             = $this->id;
        $json['name']           = $this->name;
        $json['price_money']    = $this->priceMoney;
        $json['on_by_default']  = $this->onByDefault;
        $json['ordinal']        = $this->ordinal;
        $json['modifier_list_id'] = $this->modifierListId;
        $json['v2_id']          = $this->v2Id;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
