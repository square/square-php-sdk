<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The timeline for card payments.
 */
class CardPaymentTimeline implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $authorizedAt;

    /**
     * @var string|null
     */
    private $capturedAt;

    /**
     * @var string|null
     */
    private $voidedAt;

    /**
     * Returns Authorized At.
     *
     * The timestamp when the payment was authorized, in RFC 3339 format.
     */
    public function getAuthorizedAt(): ?string
    {
        return $this->authorizedAt;
    }

    /**
     * Sets Authorized At.
     *
     * The timestamp when the payment was authorized, in RFC 3339 format.
     *
     * @maps authorized_at
     */
    public function setAuthorizedAt(?string $authorizedAt): void
    {
        $this->authorizedAt = $authorizedAt;
    }

    /**
     * Returns Captured At.
     *
     * The timestamp when the payment was captured, in RFC 3339 format.
     */
    public function getCapturedAt(): ?string
    {
        return $this->capturedAt;
    }

    /**
     * Sets Captured At.
     *
     * The timestamp when the payment was captured, in RFC 3339 format.
     *
     * @maps captured_at
     */
    public function setCapturedAt(?string $capturedAt): void
    {
        $this->capturedAt = $capturedAt;
    }

    /**
     * Returns Voided At.
     *
     * The timestamp when the payment was voided, in RFC 3339 format.
     */
    public function getVoidedAt(): ?string
    {
        return $this->voidedAt;
    }

    /**
     * Sets Voided At.
     *
     * The timestamp when the payment was voided, in RFC 3339 format.
     *
     * @maps voided_at
     */
    public function setVoidedAt(?string $voidedAt): void
    {
        $this->voidedAt = $voidedAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->authorizedAt)) {
            $json['authorized_at'] = $this->authorizedAt;
        }
        if (isset($this->capturedAt)) {
            $json['captured_at']   = $this->capturedAt;
        }
        if (isset($this->voidedAt)) {
            $json['voided_at']     = $this->voidedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
