<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an applied portion of a discount to a line item in an order.
 *
 * Order scoped discounts have automatically applied discounts present for each line item.
 * Line-item scoped discounts must have applied discounts added manually for any applicable line
 * items. The corresponding applied money is automatically computed based on participating
 * line items.
 */
class OrderLineItemAppliedDiscount extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID that identifies the applied discount only within this order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * The `uid` of the discount that the applied discount represents. It must
     * reference a discount present in the `order.discounts` field.
     *
     * This field is immutable. To change which discounts apply to a line item,
     * you must delete the discount and re-add it as a new `OrderLineItemAppliedDiscount`.
     *
     * @var string $discountUid
     */
    #[JsonProperty('discount_uid')]
    private string $discountUid;

    /**
     * @var ?Money $appliedMoney The amount of money applied by the discount to the line item.
     */
    #[JsonProperty('applied_money')]
    private ?Money $appliedMoney;

    /**
     * @param array{
     *   discountUid: string,
     *   uid?: ?string,
     *   appliedMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->discountUid = $values['discountUid'];
        $this->appliedMoney = $values['appliedMoney'] ?? null;
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
     * @return string
     */
    public function getDiscountUid(): string
    {
        return $this->discountUid;
    }

    /**
     * @param string $value
     */
    public function setDiscountUid(string $value): self
    {
        $this->discountUid = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getAppliedMoney(): ?Money
    {
        return $this->appliedMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setAppliedMoney(?Money $value = null): self
    {
        $this->appliedMoney = $value;
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
