<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents details about an `UNBLOCK` [gift card activity type](entity:GiftCardActivityType).
 */
class GiftCardActivityUnblock extends JsonSerializableType
{
    /**
     * The reason the gift card was unblocked.
     * See [Reason](#type-reason) for possible values
     *
     * @var 'CHARGEBACK_UNBLOCK' $reason
     */
    #[JsonProperty('reason')]
    private string $reason;

    /**
     * @param array{
     *   reason: 'CHARGEBACK_UNBLOCK',
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->reason = $values['reason'];
    }

    /**
     * @return 'CHARGEBACK_UNBLOCK'
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param 'CHARGEBACK_UNBLOCK' $value
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
