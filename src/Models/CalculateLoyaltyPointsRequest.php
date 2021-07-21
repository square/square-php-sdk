<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request to calculate the points that a buyer can earn from
 * a specified purchase.
 */
class CalculateLoyaltyPointsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var Money|null
     */
    private $transactionAmountMoney;

    /**
     * Returns Order Id.
     *
     * The [order]($m/Order) ID for which to calculate the points.
     * Specify this field if your application uses the Orders API to process orders.
     * Otherwise, specify the `transaction_amount_money`.
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The [order]($m/Order) ID for which to calculate the points.
     * Specify this field if your application uses the Orders API to process orders.
     * Otherwise, specify the `transaction_amount_money`.
     *
     * @maps order_id
     */
    public function setOrderId(?string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * Returns Transaction Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTransactionAmountMoney(): ?Money
    {
        return $this->transactionAmountMoney;
    }

    /**
     * Sets Transaction Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps transaction_amount_money
     */
    public function setTransactionAmountMoney(?Money $transactionAmountMoney): void
    {
        $this->transactionAmountMoney = $transactionAmountMoney;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->orderId)) {
            $json['order_id']                 = $this->orderId;
        }
        if (isset($this->transactionAmountMoney)) {
            $json['transaction_amount_money'] = $this->transactionAmountMoney;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
