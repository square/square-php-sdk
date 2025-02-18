<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents details about a `DEACTIVATE` [gift card activity type](entity:GiftCardActivityType).
 */
class GiftCardActivityDeactivate extends JsonSerializableType
{
    /**
     * The reason the gift card was deactivated.
     * See [Reason](#type-reason) for possible values
     *
     * @var value-of<GiftCardActivityDeactivateReason> $reason
     */
    #[JsonProperty('reason')]
    private string $reason;

    /**
     * @param array{
     *   reason: value-of<GiftCardActivityDeactivateReason>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->reason = $values['reason'];
    }

    /**
     * @return value-of<GiftCardActivityDeactivateReason>
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param value-of<GiftCardActivityDeactivateReason> $value
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
