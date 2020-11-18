<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Reflects the current status of a balance payment.
 */
class BalancePaymentDetails implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $accountId;

    /**
     * @var string|null
     */
    private $status;

    /**
     * Returns Account Id.
     *
     * The ID of the account used to fund the payment.
     */
    public function getAccountId(): ?string
    {
        return $this->accountId;
    }

    /**
     * Sets Account Id.
     *
     * The ID of the account used to fund the payment.
     *
     * @maps account_id
     */
    public function setAccountId(?string $accountId): void
    {
        $this->accountId = $accountId;
    }

    /**
     * Returns Status.
     *
     * The balance payment’s current state. The state can be COMPLETED or FAILED.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The balance payment’s current state. The state can be COMPLETED or FAILED.
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
        $json['account_id'] = $this->accountId;
        $json['status']    = $this->status;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
