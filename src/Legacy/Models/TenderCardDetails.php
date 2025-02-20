<?php

declare(strict_types=1);

namespace Square\Legacy\Models;

use stdClass;

/**
 * Represents additional details of a tender with `type` `CARD` or `SQUARE_GIFT_CARD`
 */
class TenderCardDetails implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $status;

    /**
     * @var Card|null
     */
    private $card;

    /**
     * @var string|null
     */
    private $entryMethod;

    /**
     * Returns Status.
     * Indicates the card transaction's current status.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     * Indicates the card transaction's current status.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Card.
     * Represents the payment details of a card to be used for payments. These
     * details are determined by the payment token generated by Web Payments SDK.
     */
    public function getCard(): ?Card
    {
        return $this->card;
    }

    /**
     * Sets Card.
     * Represents the payment details of a card to be used for payments. These
     * details are determined by the payment token generated by Web Payments SDK.
     *
     * @maps card
     */
    public function setCard(?Card $card): void
    {
        $this->card = $card;
    }

    /**
     * Returns Entry Method.
     * Indicates the method used to enter the card's details.
     */
    public function getEntryMethod(): ?string
    {
        return $this->entryMethod;
    }

    /**
     * Sets Entry Method.
     * Indicates the method used to enter the card's details.
     *
     * @maps entry_method
     */
    public function setEntryMethod(?string $entryMethod): void
    {
        $this->entryMethod = $entryMethod;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->status)) {
            $json['status']       = $this->status;
        }
        if (isset($this->card)) {
            $json['card']         = $this->card;
        }
        if (isset($this->entryMethod)) {
            $json['entry_method'] = $this->entryMethod;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
