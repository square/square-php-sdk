<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Provides metadata when the event `type` is `OTHER`.
 */
class LoyaltyEventOther implements \JsonSerializable
{
    /**
     * @var string
     */
    private $loyaltyProgramId;

    /**
     * @var int
     */
    private $points;

    /**
     * @param string $loyaltyProgramId
     * @param int $points
     */
    public function __construct(string $loyaltyProgramId, int $points)
    {
        $this->loyaltyProgramId = $loyaltyProgramId;
        $this->points = $points;
    }

    /**
     * Returns Loyalty Program Id.
     *
     * The Square-assigned ID of the [loyalty program]($m/LoyaltyProgram).
     */
    public function getLoyaltyProgramId(): string
    {
        return $this->loyaltyProgramId;
    }

    /**
     * Sets Loyalty Program Id.
     *
     * The Square-assigned ID of the [loyalty program]($m/LoyaltyProgram).
     *
     * @required
     * @maps loyalty_program_id
     */
    public function setLoyaltyProgramId(string $loyaltyProgramId): void
    {
        $this->loyaltyProgramId = $loyaltyProgramId;
    }

    /**
     * Returns Points.
     *
     * The number of points added or removed.
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * Sets Points.
     *
     * The number of points added or removed.
     *
     * @required
     * @maps points
     */
    public function setPoints(int $points): void
    {
        $this->points = $points;
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
        $json['points']             = $this->points;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
