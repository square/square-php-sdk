<?php

declare(strict_types=1);

namespace Square\Legacy\Models;

use stdClass;

/**
 * Defines the fields that are included in the response body of
 * a request to the [DisableCard]($e/Cards/DisableCard) endpoint.
 *
 * Note: if there are errors processing the request, the card field will not be
 * present.
 */
class DisableCardResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Card|null
     */
    private $card;

    /**
     * Returns Errors.
     * Information on errors encountered during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     * Information on errors encountered during the request.
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
        if (isset($this->errors)) {
            $json['errors'] = $this->errors;
        }
        if (isset($this->card)) {
            $json['card']   = $this->card;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
