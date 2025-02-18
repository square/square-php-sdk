<?php

namespace Square\Loyalty\Programs\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\Money;

class CalculateLoyaltyPointsRequest extends JsonSerializableType
{
    /**
     * @var string $programId The ID of the [loyalty program](entity:LoyaltyProgram), which defines the rules for accruing points.
     */
    private string $programId;

    /**
     * The [order](entity:Order) ID for which to calculate the points.
     * Specify this field if your application uses the Orders API to process orders.
     * Otherwise, specify the `transaction_amount_money`.
     *
     * @var ?string $orderId
     */
    #[JsonProperty('order_id')]
    private ?string $orderId;

    /**
     * The purchase amount for which to calculate the points.
     * Specify this field if your application does not use the Orders API to process orders.
     * Otherwise, specify the `order_id`.
     *
     * @var ?Money $transactionAmountMoney
     */
    #[JsonProperty('transaction_amount_money')]
    private ?Money $transactionAmountMoney;

    /**
     * The ID of the target [loyalty account](entity:LoyaltyAccount). Optionally specify this field
     * if your application uses the Orders API to process orders.
     *
     * If specified, the `promotion_points` field in the response shows the number of points the buyer would
     * earn from the purchase. In this case, Square uses the account ID to determine whether the promotion's
     * `trigger_limit` (the maximum number of times that a buyer can trigger the promotion) has been reached.
     * If not specified, the `promotion_points` field shows the number of points the purchase qualifies
     * for regardless of the trigger limit.
     *
     * @var ?string $loyaltyAccountId
     */
    #[JsonProperty('loyalty_account_id')]
    private ?string $loyaltyAccountId;

    /**
     * @param array{
     *   programId: string,
     *   orderId?: ?string,
     *   transactionAmountMoney?: ?Money,
     *   loyaltyAccountId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->programId = $values['programId'];
        $this->orderId = $values['orderId'] ?? null;
        $this->transactionAmountMoney = $values['transactionAmountMoney'] ?? null;
        $this->loyaltyAccountId = $values['loyaltyAccountId'] ?? null;
    }

    /**
     * @return string
     */
    public function getProgramId(): string
    {
        return $this->programId;
    }

    /**
     * @param string $value
     */
    public function setProgramId(string $value): self
    {
        $this->programId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @param ?string $value
     */
    public function setOrderId(?string $value = null): self
    {
        $this->orderId = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getTransactionAmountMoney(): ?Money
    {
        return $this->transactionAmountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTransactionAmountMoney(?Money $value = null): self
    {
        $this->transactionAmountMoney = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLoyaltyAccountId(): ?string
    {
        return $this->loyaltyAccountId;
    }

    /**
     * @param ?string $value
     */
    public function setLoyaltyAccountId(?string $value = null): self
    {
        $this->loyaltyAccountId = $value;
        return $this;
    }
}
