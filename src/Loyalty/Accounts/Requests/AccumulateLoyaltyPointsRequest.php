<?php

namespace Square\Loyalty\Accounts\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\LoyaltyEventAccumulatePoints;
use Square\Core\Json\JsonProperty;

class AccumulateLoyaltyPointsRequest extends JsonSerializableType
{
    /**
     * @var string $accountId The ID of the target [loyalty account](entity:LoyaltyAccount).
     */
    private string $accountId;

    /**
     * The points to add to the account.
     * If you are using the Orders API to manage orders, specify the order ID.
     * Otherwise, specify the points to add.
     *
     * @var LoyaltyEventAccumulatePoints $accumulatePoints
     */
    #[JsonProperty('accumulate_points')]
    private LoyaltyEventAccumulatePoints $accumulatePoints;

    /**
     * A unique string that identifies the `AccumulateLoyaltyPoints` request.
     * Keys can be any valid string but must be unique for every request.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @var string $locationId The [location](entity:Location) where the purchase was made.
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * @param array{
     *   accountId: string,
     *   accumulatePoints: LoyaltyEventAccumulatePoints,
     *   idempotencyKey: string,
     *   locationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accountId = $values['accountId'];
        $this->accumulatePoints = $values['accumulatePoints'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->locationId = $values['locationId'];
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
     * @return LoyaltyEventAccumulatePoints
     */
    public function getAccumulatePoints(): LoyaltyEventAccumulatePoints
    {
        return $this->accumulatePoints;
    }

    /**
     * @param LoyaltyEventAccumulatePoints $value
     */
    public function setAccumulatePoints(LoyaltyEventAccumulatePoints $value): self
    {
        $this->accumulatePoints = $value;
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
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }
}
