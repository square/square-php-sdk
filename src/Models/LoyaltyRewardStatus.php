<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The status of the loyalty reward.
 */
class LoyaltyRewardStatus
{
    /**
     * The reward is issued.
     */
    public const ISSUED = 'ISSUED';

    /**
     * The reward is redeemed.
     */
    public const REDEEMED = 'REDEEMED';

    /**
     * The reward is deleted.
     */
    public const DELETED = 'DELETED';

    private const _ALL_VALUES = [self::ISSUED, self::REDEEMED, self::DELETED];

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
