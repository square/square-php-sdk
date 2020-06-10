<?php

declare(strict_types=1);

namespace Square\Models;

class CancelTerminalCheckoutResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var TerminalCheckout|null
     */
    private $checkout;

    /**
     * Returns Errors.
     *
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
     *
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
     * Returns Checkout.
     */
    public function getCheckout(): ?TerminalCheckout
    {
        return $this->checkout;
    }

    /**
     * Sets Checkout.
     *
     * @maps checkout
     */
    public function setCheckout(?TerminalCheckout $checkout): void
    {
        $this->checkout = $checkout;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['errors']   = $this->errors;
        $json['checkout'] = $this->checkout;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
