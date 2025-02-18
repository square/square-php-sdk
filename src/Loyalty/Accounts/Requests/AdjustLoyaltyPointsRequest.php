<?php

namespace Square\Loyalty\Accounts\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\LoyaltyEventAdjustPoints;

class AdjustLoyaltyPointsRequest extends JsonSerializableType
{
    /**
     * @var string $accountId The ID of the target [loyalty account](entity:LoyaltyAccount).
     */
    private string $accountId;

    /**
     * A unique string that identifies this `AdjustLoyaltyPoints` request.
     * Keys can be any valid string, but must be unique for every request.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * The points to add or subtract and the reason for the adjustment. To add points, specify a positive integer.
     * To subtract points, specify a negative integer.
     *
     * @var LoyaltyEventAdjustPoints $adjustPoints
     */
    #[JsonProperty('adjust_points')]
    private LoyaltyEventAdjustPoints $adjustPoints;

    /**
     * Indicates whether to allow a negative adjustment to result in a negative balance. If `true`, a negative
     * balance is allowed when subtracting points. If `false`, Square returns a `BAD_REQUEST` error when subtracting
     * the specified number of points would result in a negative balance. The default value is `false`.
     *
     * @var ?bool $allowNegativeBalance
     */
    #[JsonProperty('allow_negative_balance')]
    private ?bool $allowNegativeBalance;

    /**
     * @param array{
     *   accountId: string,
     *   idempotencyKey: string,
     *   adjustPoints: LoyaltyEventAdjustPoints,
     *   allowNegativeBalance?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accountId = $values['accountId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->adjustPoints = $values['adjustPoints'];
        $this->allowNegativeBalance = $values['allowNegativeBalance'] ?? null;
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * @param string $value
     */
    public function setAccountId(string $value): self
    {
        $this->accountId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return LoyaltyEventAdjustPoints
     */
    public function getAdjustPoints(): LoyaltyEventAdjustPoints
    {
        return $this->adjustPoints;
    }

    /**
     * @param LoyaltyEventAdjustPoints $value
     */
    public function setAdjustPoints(LoyaltyEventAdjustPoints $value): self
    {
        $this->adjustPoints = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAllowNegativeBalance(): ?bool
    {
        return $this->allowNegativeBalance;
    }

    /**
     * @param ?bool $value
     */
    public function setAllowNegativeBalance(?bool $value = null): self
    {
        $this->allowNegativeBalance = $value;
        return $this;
    }
}
