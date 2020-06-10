<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A refund of an [AdditionalRecipientReceivable](#type-additionalrecipientreceivable). This includes
 * the ID of the additional recipient receivable associated to this object, as well as a reference to
 * the [Refund](#type-refund) that created this receivable refund.
 */
class AdditionalRecipientReceivableRefund implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $receivableId;

    /**
     * @var string
     */
    private $refundId;

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
     * @param string $id
     * @param string $receivableId
     * @param string $refundId
     * @param string $transactionLocationId
     * @param Money $amountMoney
     */
    public function __construct(
        string $id,
        string $receivableId,
        string $refundId,
        string $transactionLocationId,
        Money $amountMoney
    ) {
        $this->id = $id;
        $this->receivableId = $receivableId;
        $this->refundId = $refundId;
        $this->transactionLocationId = $transactionLocationId;
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Id.
     *
     * The receivable refund's unique ID, issued by Square payments servers.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The receivable refund's unique ID, issued by Square payments servers.
     *
     * @required
     * @maps id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Receivable Id.
     *
     * The ID of the receivable that the refund was applied to.
     */
    public function getReceivableId(): string
    {
        return $this->receivableId;
    }

    /**
     * Sets Receivable Id.
     *
     * The ID of the receivable that the refund was applied to.
     *
     * @required
     * @maps receivable_id
     */
    public function setReceivableId(string $receivableId): void
    {
        $this->receivableId = $receivableId;
    }

    /**
     * Returns Refund Id.
     *
     * The ID of the refund that is associated to this receivable refund.
     */
    public function getRefundId(): string
    {
        return $this->refundId;
    }

    /**
     * Sets Refund Id.
     *
     * The ID of the refund that is associated to this receivable refund.
     *
     * @required
     * @maps refund_id
     */
    public function setRefundId(string $refundId): void
    {
        $this->refundId = $refundId;
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
     * The time when the refund was created, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the refund was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
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
        $json['receivable_id']         = $this->receivableId;
        $json['refund_id']             = $this->refundId;
        $json['transaction_location_id'] = $this->transactionLocationId;
        $json['amount_money']          = $this->amountMoney;
        $json['created_at']            = $this->createdAt;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
