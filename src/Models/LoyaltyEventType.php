<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The type of the loyalty event.
 */
class LoyaltyEventType
{
    /**
     * Points are added to a loyalty account for a purchase.
     */
    public const ACCUMULATE_POINTS = 'ACCUMULATE_POINTS';

    /**
     * A [loyalty reward]($m/LoyaltyReward) is created.
     */
    public const CREATE_REWARD = 'CREATE_REWARD';

    /**
     * A loyalty reward is redeemed.
     */
    public const REDEEM_REWARD = 'REDEEM_REWARD';

    /**
     * A loyalty reward is deleted.
     */
    public const DELETE_REWARD = 'DELETE_REWARD';

    /**
     * Loyalty points are manually adjusted.
     */
    public const ADJUST_POINTS = 'ADJUST_POINTS';

    /**
     * Loyalty points are expired according to the
     * expiration policy of the loyalty program.
     */
    public const EXPIRE_POINTS = 'EXPIRE_POINTS';

    /**
     * Some other loyalty event occurred.
     */
    public const OTHER = 'OTHER';

    private const _ALL_VALUES = [
        self::ACCUMULATE_POINTS,
        self::CREATE_REWARD,
        self::REDEEM_REWARD,
        self::DELETE_REWARD,
        self::ADJUST_POINTS,
        self::EXPIRE_POINTS,
        self::OTHER,
    ];

    /**
     * Ensures that all the given values are present in this Enum.
     *
     * @param array|null|string $value Value or a list of values to be checked
     *
     * @return array|null|string Input value(s), if all are a part of this Enum
     *
     * @throws Exception Throws exception if any given value is not in this Enum
     */
    public static function checkValue($value)
    {
        ApiHelper::checkValueInEnum($value, self::class, self::_ALL_VALUES);
        return $value;
    }
}
