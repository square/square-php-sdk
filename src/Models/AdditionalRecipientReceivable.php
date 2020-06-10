<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a monetary distribution of part of a [Transaction](#type-transaction)'s amount for
 * Transactions which included additional recipients. The location of this receivable is that same as
 * the one specified in the [AdditionalRecipient](#type-additionalrecipient).
 */
class AdditionalRecipientReceivable implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $transactionId;

    /**
     * @var string
     */
    private $transactionLocationId;

    /**
     * @var Money
     */
    private $amountMoney;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var AdditionalRecipientReceivableRefund[]|null
     */
    private $refunds;

    /**
     * @param string $id
     * @param string $transactionId
     * @param string $transactionLocationId
     * @param Money $amountMoney
     */
    public function __construct(string $id, string $transactionId, string $transactionLocationId, Money $amountMoney)
    {
        $this->id = $id;
        $this->transactionId = $transactionId;
        $this->transactionLocationId = $transactionLocationId;
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Id.
     *
     * The additional recipient receivable's unique ID, issued by Square payments servers.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The additional recipient receivable's unique ID, issued by Square payments servers.
     *
     * @required
     * @maps id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Transaction Id.
     *
     * The ID of the transaction that the additional recipient receivable was applied to.
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * Sets Transaction Id.
     *
     * The ID of the transaction that the additional recipient receivable was applied to.
     *
     * @required
     * @maps transaction_id
     */
    public function setTransactionId(string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    /**
     * Returns Transaction Location Id.
     *
     * The ID of the location that created the receivable. This is the location ID on the associated
     * transaction.
     */
    public function getTransactionLocationId(): string
    {
        return $this->transactionLocationId;
    }

    /**
     * Sets Transaction Location Id.
     *
     * The ID of the location that created the receivable. This is the location ID on the associated
     * transaction.
     *
     * @required
     * @maps transaction_location_id
     */
    public function setTransactionLocationId(string $transactionLocationId): void
    {
        $this->transactionLocationId = $transactionLocationId;
    }

    /**
     * Returns Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAmountMoney(): Money
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @required
     * @maps amount_money
     */
    public function setAmountMoney(Money $amountMoney): void
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Created At.
     *
     * The time when the additional recipient receivable was created, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the additional recipient receivable was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Refunds.
     *
     * Any refunds of the receivable that have been applied.
     *
     * @return AdditionalRecipientReceivableRefund[]|null
     */
    public function getRefunds(): ?array
    {
        return $this->refunds;
    }

    /**
     * Sets Refunds.
     *
     * Any refunds of the receivable that have been applied.
     *
     * @maps refunds
     *
     * @param AdditionalRecipientReceivableRefund[]|null $refunds
     */
    public function setRefunds(?array $refunds): void
    {
        $this->refunds = $refunds;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                    = $this->id;
        $json['transaction_id']        = $this->transactionId;
        $json['transaction_location_id'] = $this->transactionLocationId;
        $json['amount_money']          = $this->amountMoney;
        $json['created_at']            = $this->createdAt;
        $json['refunds']               = $this->refunds;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
