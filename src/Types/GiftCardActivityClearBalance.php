<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents details about a `CLEAR_BALANCE` [gift card activity type](entity:GiftCardActivityType).
 */
class GiftCardActivityClearBalance extends JsonSerializableType
{
    /**
     * The reason the gift card balance was cleared.
     * See [Reason](#type-reason) for possible values
     *
     * @var value-of<GiftCardActivityClearBalanceReason> $reason
     */
    #[JsonProperty('reason')]
    private string $reason;

    /**
     * @param array{
     *   reason: value-of<GiftCardActivityClearBalanceReason>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->reason = $values['reason'];
    }

    /**
     * @return value-of<GiftCardActivityClearBalanceReason>
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param value-of<GiftCardActivityClearBalanceReason> $value
     */
    public function setReason(string $value): self
    {
        $this->reason = $value;
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
