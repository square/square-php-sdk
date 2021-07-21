<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1PaymentDiscount
 */
class V1PaymentDiscount implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var V1Money|null
     */
    private $appliedMoney;

    /**
     * @var string|null
     */
    private $discountId;

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
     * Returns Applied Money.
     */
    public function getAppliedMoney(): ?V1Money
    {
        return $this->appliedMoney;
    }

    /**
     * Sets Applied Money.
     *
     * @maps applied_money
     */
    public function setAppliedMoney(?V1Money $appliedMoney): void
    {
        $this->appliedMoney = $appliedMoney;
    }

    /**
     * Returns Discount Id.
     *
     * The ID of the applied discount, if available. Discounts applied in older versions of Square Register
     * might not have an ID.
     */
    public function getDiscountId(): ?string
    {
        return $this->discountId;
    }

    /**
     * Sets Discount Id.
     *
     * The ID of the applied discount, if available. Discounts applied in older versions of Square Register
     * might not have an ID.
     *
     * @maps discount_id
     */
    public function setDiscountId(?string $discountId): void
    {
        $this->discountId = $discountId;
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
            $json['name']          = $this->name;
        }
        if (isset($this->appliedMoney)) {
            $json['applied_money'] = $this->appliedMoney;
        }
        if (isset($this->discountId)) {
            $json['discount_id']   = $this->discountId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
