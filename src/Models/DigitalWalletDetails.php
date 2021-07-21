<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Additional details about `WALLET` type payments. Contains only non-confidential information.
 */
class DigitalWalletDetails implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $status;

    /**
     * Returns Status.
     *
     * The status of the `WALLET` payment. The status can be `AUTHORIZED`, `CAPTURED`, `VOIDED`, or
     * `FAILED`.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The status of the `WALLET` payment. The status can be `AUTHORIZED`, `CAPTURED`, `VOIDED`, or
     * `FAILED`.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->status)) {
            $json['status'] = $this->status;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
