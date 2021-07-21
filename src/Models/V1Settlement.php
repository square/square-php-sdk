<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1Settlement
 */
class V1Settlement implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var V1Money|null
     */
    private $totalMoney;

    /**
     * @var string|null
     */
    private $initiatedAt;

    /**
     * @var string|null
     */
    private $bankAccountId;

    /**
     * @var V1SettlementEntry[]|null
     */
    private $entries;

    /**
     * Returns Id.
     *
     * The settlement's unique identifier.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The settlement's unique identifier.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Status.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Total Money.
     */
    public function getTotalMoney(): ?V1Money
    {
        return $this->totalMoney;
    }

    /**
     * Sets Total Money.
     *
     * @maps total_money
     */
    public function setTotalMoney(?V1Money $totalMoney): void
    {
        $this->totalMoney = $totalMoney;
    }

    /**
     * Returns Initiated At.
     *
     * The time when the settlement was submitted for deposit or withdrawal, in ISO 8601 format.
     */
    public function getInitiatedAt(): ?string
    {
        return $this->initiatedAt;
    }

    /**
     * Sets Initiated At.
     *
     * The time when the settlement was submitted for deposit or withdrawal, in ISO 8601 format.
     *
     * @maps initiated_at
     */
    public function setInitiatedAt(?string $initiatedAt): void
    {
        $this->initiatedAt = $initiatedAt;
    }

    /**
     * Returns Bank Account Id.
     *
     * The Square-issued unique identifier for the bank account associated with the settlement.
     */
    public function getBankAccountId(): ?string
    {
        return $this->bankAccountId;
    }

    /**
     * Sets Bank Account Id.
     *
     * The Square-issued unique identifier for the bank account associated with the settlement.
     *
     * @maps bank_account_id
     */
    public function setBankAccountId(?string $bankAccountId): void
    {
        $this->bankAccountId = $bankAccountId;
    }

    /**
     * Returns Entries.
     *
     * The entries included in this settlement.
     *
     * @return V1SettlementEntry[]|null
     */
    public function getEntries(): ?array
    {
        return $this->entries;
    }

    /**
     * Sets Entries.
     *
     * The entries included in this settlement.
     *
     * @maps entries
     *
     * @param V1SettlementEntry[]|null $entries
     */
    public function setEntries(?array $entries): void
    {
        $this->entries = $entries;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']              = $this->id;
        }
        if (isset($this->status)) {
            $json['status']          = $this->status;
        }
        if (isset($this->totalMoney)) {
            $json['total_money']     = $this->totalMoney;
        }
        if (isset($this->initiatedAt)) {
            $json['initiated_at']    = $this->initiatedAt;
        }
        if (isset($this->bankAccountId)) {
            $json['bank_account_id'] = $this->bankAccountId;
        }
        if (isset($this->entries)) {
            $json['entries']         = $this->entries;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
