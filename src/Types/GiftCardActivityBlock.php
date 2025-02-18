<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents details about a `BLOCK` [gift card activity type](entity:GiftCardActivityType).
 */
class GiftCardActivityBlock extends JsonSerializableType
{
    /**
     * The reason the gift card was blocked.
     * See [Reason](#type-reason) for possible values
     *
     * @var 'CHARGEBACK_BLOCK' $reason
     */
    #[JsonProperty('reason')]
    private string $reason;

    /**
     * @param array{
     *   reason: 'CHARGEBACK_BLOCK',
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->reason = $values['reason'];
    }

    /**
     * @return 'CHARGEBACK_BLOCK'
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param 'CHARGEBACK_BLOCK' $value
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
