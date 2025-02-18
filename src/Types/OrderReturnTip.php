<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A tip being returned.
 */
class OrderReturnTip extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID that identifies the tip only within this order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * The amount of tip being returned
     * --
     *
     * @var ?Money $appliedMoney
     */
    #[JsonProperty('applied_money')]
    private ?Money $appliedMoney;

    /**
     * @var ?string $sourceTenderUid The tender `uid` from the order that contains the original application of this tip.
     */
    #[JsonProperty('source_tender_uid')]
    private ?string $sourceTenderUid;

    /**
     * @var ?string $sourceTenderId The tender `id` from the order that contains the original application of this tip.
     */
    #[JsonProperty('source_tender_id')]
    private ?string $sourceTenderId;

    /**
     * @param array{
     *   uid?: ?string,
     *   appliedMoney?: ?Money,
     *   sourceTenderUid?: ?string,
     *   sourceTenderId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->appliedMoney = $values['appliedMoney'] ?? null;
        $this->sourceTenderUid = $values['sourceTenderUid'] ?? null;
        $this->sourceTenderId = $values['sourceTenderId'] ?? null;
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
     * @return ?string
     */
    public function getSourceTenderUid(): ?string
    {
        return $this->sourceTenderUid;
    }

    /**
     * @param ?string $value
     */
    public function setSourceTenderUid(?string $value = null): self
    {
        $this->sourceTenderUid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSourceTenderId(): ?string
    {
        return $this->sourceTenderId;
    }

    /**
     * @param ?string $value
     */
    public function setSourceTenderId(?string $value = null): self
    {
        $this->sourceTenderId = $value;
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
