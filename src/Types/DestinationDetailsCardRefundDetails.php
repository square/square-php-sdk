<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DestinationDetailsCardRefundDetails extends JsonSerializableType
{
    /**
     * @var ?Card $card The card's non-confidential details.
     */
    #[JsonProperty('card')]
    private ?Card $card;

    /**
     * The method used to enter the card's details for the refund. The method can be
     * `KEYED`, `SWIPED`, `EMV`, `ON_FILE`, or `CONTACTLESS`.
     *
     * @var ?string $entryMethod
     */
    #[JsonProperty('entry_method')]
    private ?string $entryMethod;

    /**
     * @var ?string $authResultCode The authorization code provided by the issuer when a refund is approved.
     */
    #[JsonProperty('auth_result_code')]
    private ?string $authResultCode;

    /**
     * @param array{
     *   card?: ?Card,
     *   entryMethod?: ?string,
     *   authResultCode?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->card = $values['card'] ?? null;
        $this->entryMethod = $values['entryMethod'] ?? null;
        $this->authResultCode = $values['authResultCode'] ?? null;
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
     * @return ?string
     */
    public function getEntryMethod(): ?string
    {
        return $this->entryMethod;
    }

    /**
     * @param ?string $value
     */
    public function setEntryMethod(?string $value = null): self
    {
        $this->entryMethod = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAuthResultCode(): ?string
    {
        return $this->authResultCode;
    }

    /**
     * @param ?string $value
     */
    public function setAuthResultCode(?string $value = null): self
    {
        $this->authResultCode = $value;
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
