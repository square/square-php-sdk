<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The payment the cardholder disputed.
 */
class DisputedPayment implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $paymentId;

    /**
     * Returns Payment Id.
     *
     * Square-generated unique ID of the payment being disputed.
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     *
     * Square-generated unique ID of the payment being disputed.
     *
     * @maps payment_id
     */
    public function setPaymentId(?string $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->paymentId)) {
            $json['payment_id'] = $this->paymentId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
