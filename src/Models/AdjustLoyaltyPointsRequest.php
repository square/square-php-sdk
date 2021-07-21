<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request to adjust (add or subtract) points manually.
 */
class AdjustLoyaltyPointsRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var LoyaltyEventAdjustPoints
     */
    private $adjustPoints;

    /**
     * @param string $idempotencyKey
     * @param LoyaltyEventAdjustPoints $adjustPoints
     */
    public function __construct(string $idempotencyKey, LoyaltyEventAdjustPoints $adjustPoints)
    {
        $this->idempotencyKey = $idempotencyKey;
        $this->adjustPoints = $adjustPoints;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies this `AdjustLoyaltyPoints` request.
     * Keys can be any valid string, but must be unique for every request.
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies this `AdjustLoyaltyPoints` request.
     * Keys can be any valid string, but must be unique for every request.
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey(string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Adjust Points.
     *
     * Provides metadata when the event `type` is `ADJUST_POINTS`.
     */
    public function getAdjustPoints(): LoyaltyEventAdjustPoints
    {
        return $this->adjustPoints;
    }

    /**
     * Sets Adjust Points.
     *
     * Provides metadata when the event `type` is `ADJUST_POINTS`.
     *
     * @required
     * @maps adjust_points
     */
    public function setAdjustPoints(LoyaltyEventAdjustPoints $adjustPoints): void
    {
        $this->adjustPoints = $adjustPoints;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['idempotency_key'] = $this->idempotencyKey;
        $json['adjust_points']   = $this->adjustPoints;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
