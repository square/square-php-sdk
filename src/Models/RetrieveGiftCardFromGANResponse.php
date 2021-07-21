<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A response that contains a `GiftCard`. This response might contain a set of `Error` objects
 * if the request resulted in errors.
 */
class RetrieveGiftCardFromGANResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var GiftCard|null
     */
    private $giftCard;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Gift Card.
     *
     * Represents a Square gift card.
     */
    public function getGiftCard(): ?GiftCard
    {
        return $this->giftCard;
    }

    /**
     * Sets Gift Card.
     *
     * Represents a Square gift card.
     *
     * @maps gift_card
     */
    public function setGiftCard(?GiftCard $giftCard): void
    {
        $this->giftCard = $giftCard;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors']    = $this->errors;
        }
        if (isset($this->giftCard)) {
            $json['gift_card'] = $this->giftCard;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
