<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents the details of a tender with `type` `BANK_TRANSFER`.
 *
 * See [PaymentBankTransferDetails](#type-paymentbanktransferdetails) for more exposed details of a
 * bank transfer payment.
 */
class TenderBankTransferDetails implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $status;

    /**
     * Returns Status.
     *
     * Indicates the bank transfer's current status.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Indicates the bank transfer's current status.
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
        $json['status'] = $this->status;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
