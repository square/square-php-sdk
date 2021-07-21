<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the response returned by [GetPayment]($e/Payments/GetPayment).
 */
class GetPaymentResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Payment|null
     */
    private $payment;

    /**
     * Returns Errors.
     *
     * Information about errors encountered during the request.
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
     * Information about errors encountered during the request.
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
     * Returns Payment.
     *
     * Represents a payment processed by the Square API.
     */
    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    /**
     * Sets Payment.
     *
     * Represents a payment processed by the Square API.
     *
     * @maps payment
     */
    public function setPayment(?Payment $payment): void
    {
        $this->payment = $payment;
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
            $json['errors']  = $this->errors;
        }
        if (isset($this->payment)) {
            $json['payment'] = $this->payment;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
