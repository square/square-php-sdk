<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1Discount
 */
class V1Discount implements \JsonSerializable
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
     * @var string|null
     */
    private $rate;

    /**
     * @var V1Money|null
     */
    private $amountMoney;

    /**
     * @var string|null
     */
    private $discountType;

    /**
     * @var bool|null
     */
    private $pinRequired;

    /**
     * @var string|null
     */
    private $color;

    /**
     * @var string|null
     */
    private $v2Id;

    /**
     * Returns Id.
     *
     * The discount's unique ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The discount's unique ID.
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
     * The discount's name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The discount's name.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Rate.
     *
     * The rate of the discount, as a string representation of a decimal number. A value of 0.07
     * corresponds to a rate of 7%. This rate is 0 if discount_type is VARIABLE_PERCENTAGE.
     */
    public function getRate(): ?string
    {
        return $this->rate;
    }

    /**
     * Sets Rate.
     *
     * The rate of the discount, as a string representation of a decimal number. A value of 0.07
     * corresponds to a rate of 7%. This rate is 0 if discount_type is VARIABLE_PERCENTAGE.
     *
     * @maps rate
     */
    public function setRate(?string $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * Returns Amount Money.
     */
    public function getAmountMoney(): ?V1Money
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     *
     * @maps amount_money
     */
    public function setAmountMoney(?V1Money $amountMoney): void
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Discount Type.
     */
    public function getDiscountType(): ?string
    {
        return $this->discountType;
    }

    /**
     * Sets Discount Type.
     *
     * @maps discount_type
     */
    public function setDiscountType(?string $discountType): void
    {
        $this->discountType = $discountType;
    }

    /**
     * Returns Pin Required.
     *
     * Indicates whether a mobile staff member needs to enter their PIN to apply the discount to a payment.
     */
    public function getPinRequired(): ?bool
    {
        return $this->pinRequired;
    }

    /**
     * Sets Pin Required.
     *
     * Indicates whether a mobile staff member needs to enter their PIN to apply the discount to a payment.
     *
     * @maps pin_required
     */
    public function setPinRequired(?bool $pinRequired): void
    {
        $this->pinRequired = $pinRequired;
    }

    /**
     * Returns Color.
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * Sets Color.
     *
     * @maps color
     */
    public function setColor(?string $color): void
    {
        $this->color = $color;
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
        $json['id']           = $this->id;
        $json['name']         = $this->name;
        $json['rate']         = $this->rate;
        $json['amount_money'] = $this->amountMoney;
        $json['discount_type'] = $this->discountType;
        $json['pin_required'] = $this->pinRequired;
        $json['color']        = $this->color;
        $json['v2_id']        = $this->v2Id;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
