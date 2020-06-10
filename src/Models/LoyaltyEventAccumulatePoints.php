<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Provides metadata when the event `type` is `ACCUMULATE_POINTS`.
 */
class LoyaltyEventAccumulatePoints implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $loyaltyProgramId;

    /**
     * @var int|null
     */
    private $points;

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * Returns Loyalty Program Id.
     *
     * The ID of the [loyalty program](#type-LoyaltyProgram).
     */
    public function getLoyaltyProgramId(): ?string
    {
        return $this->loyaltyProgramId;
    }

    /**
     * Sets Loyalty Program Id.
     *
     * The ID of the [loyalty program](#type-LoyaltyProgram).
     *
     * @maps loyalty_program_id
     */
    public function setLoyaltyProgramId(?string $loyaltyProgramId): void
    {
        $this->loyaltyProgramId = $loyaltyProgramId;
    }

    /**
     * Returns Points.
     *
     * The number of points accumulated by the event.
     */
    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * Sets Points.
     *
     * The number of points accumulated by the event.
     *
     * @maps points
     */
    public function setPoints(?int $points): void
    {
        $this->points = $points;
    }

    /**
     * Returns Order Id.
     *
     * The ID of the [order](#type-Order) for which the buyer accumulated the points.
     * This field is returned only if the Orders API is used to process orders.
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The ID of the [order](#type-Order) for which the buyer accumulated the points.
     * This field is returned only if the Orders API is used to process orders.
     *
     * @maps order_id
     */
    public function setOrderId(?string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['loyalty_program_id'] = $this->loyaltyProgramId;
        $json['points']           = $this->points;
        $json['order_id']         = $this->orderId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
