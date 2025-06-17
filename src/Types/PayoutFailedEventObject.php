<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class PayoutFailedEventObject extends JsonSerializableType
{
    /**
     * @var ?Payout $payout The payout that failed.
     */
    #[JsonProperty('payout')]
    private ?Payout $payout;

    /**
     * @param array{
     *   payout?: ?Payout,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->payout = $values['payout'] ?? null;
    }

    /**
     * @return ?Payout
     */
    public function getPayout(): ?Payout
    {
        return $this->payout;
    }

    /**
     * @param ?Payout $value
     */
    public function setPayout(?Payout $value = null): self
    {
        $this->payout = $value;
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
