<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents additional details of a tender with `type` `CARD` or `SQUARE_GIFT_CARD`
 */
class TenderCardDetails extends JsonSerializableType
{
    /**
     * The credit card payment's current state (such as `AUTHORIZED` or
     * `CAPTURED`). See [TenderCardDetailsStatus](entity:TenderCardDetailsStatus)
     * for possible values.
     * See [TenderCardDetailsStatus](#type-tendercarddetailsstatus) for possible values
     *
     * @var ?value-of<TenderCardDetailsStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?Card $card The credit card's non-confidential details.
     */
    #[JsonProperty('card')]
    private ?Card $card;

    /**
     * The method used to enter the card's details for the transaction.
     * See [TenderCardDetailsEntryMethod](#type-tendercarddetailsentrymethod) for possible values
     *
     * @var ?value-of<TenderCardDetailsEntryMethod> $entryMethod
     */
    #[JsonProperty('entry_method')]
    private ?string $entryMethod;

    /**
     * @param array{
     *   status?: ?value-of<TenderCardDetailsStatus>,
     *   card?: ?Card,
     *   entryMethod?: ?value-of<TenderCardDetailsEntryMethod>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->card = $values['card'] ?? null;
        $this->entryMethod = $values['entryMethod'] ?? null;
    }

    /**
     * @return ?value-of<TenderCardDetailsStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<TenderCardDetailsStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?Card
     */
    public function getCard(): ?Card
    {
        return $this->card;
    }

    /**
     * @param ?Card $value
     */
    public function setCard(?Card $value = null): self
    {
        $this->card = $value;
        return $this;
    }

    /**
     * @return ?value-of<TenderCardDetailsEntryMethod>
     */
    public function getEntryMethod(): ?string
    {
        return $this->entryMethod;
    }

    /**
     * @param ?value-of<TenderCardDetailsEntryMethod> $value
     */
    public function setEntryMethod(?string $value = null): self
    {
        $this->entryMethod = $value;
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
