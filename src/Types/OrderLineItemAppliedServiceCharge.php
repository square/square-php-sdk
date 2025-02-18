<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class OrderLineItemAppliedServiceCharge extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID that identifies the applied service charge only within this order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * The `uid` of the service charge that the applied service charge represents. It must
     * reference a service charge present in the `order.service_charges` field.
     *
     * This field is immutable. To change which service charges apply to a line item,
     * delete and add a new `OrderLineItemAppliedServiceCharge`.
     *
     * @var string $serviceChargeUid
     */
    #[JsonProperty('service_charge_uid')]
    private string $serviceChargeUid;

    /**
     * @var ?Money $appliedMoney The amount of money applied by the service charge to the line item.
     */
    #[JsonProperty('applied_money')]
    private ?Money $appliedMoney;

    /**
     * @param array{
     *   serviceChargeUid: string,
     *   uid?: ?string,
     *   appliedMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->serviceChargeUid = $values['serviceChargeUid'];
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
    public function getServiceChargeUid(): string
    {
        return $this->serviceChargeUid;
    }

    /**
     * @param string $value
     */
    public function setServiceChargeUid(string $value): self
    {
        $this->serviceChargeUid = $value;
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
