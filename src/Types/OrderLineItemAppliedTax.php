<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an applied portion of a tax to a line item in an order.
 *
 * Order-scoped taxes automatically include the applied taxes in each line item.
 * Line item taxes must be referenced from any applicable line items.
 * The corresponding applied money is automatically computed, based on the
 * set of participating line items.
 */
class OrderLineItemAppliedTax extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID that identifies the applied tax only within this order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * The `uid` of the tax for which this applied tax represents. It must reference
     * a tax present in the `order.taxes` field.
     *
     * This field is immutable. To change which taxes apply to a line item, delete and add a new
     * `OrderLineItemAppliedTax`.
     *
     * @var string $taxUid
     */
    #[JsonProperty('tax_uid')]
    private string $taxUid;

    /**
     * @var ?Money $appliedMoney The amount of money applied by the tax to the line item.
     */
    #[JsonProperty('applied_money')]
    private ?Money $appliedMoney;

    /**
     * @param array{
     *   taxUid: string,
     *   uid?: ?string,
     *   appliedMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->taxUid = $values['taxUid'];
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
    public function getTaxUid(): string
    {
        return $this->taxUid;
    }

    /**
     * @param string $value
     */
    public function setTaxUid(string $value): self
    {
        $this->taxUid = $value;
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
