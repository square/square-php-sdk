<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Supported types of an action as a pending change to a subscription.
 */
class SubscriptionActionType
{
    /**
     * The action to execute a scheduled cancellation of a subscription.
     */
    public const CANCEL = 'CANCEL';

    /**
     * The action to execute a scheduled pause of a subscription.
     */
    public const PAUSE = 'PAUSE';

    /**
     * The action to execute a scheduled resumption of a subscription.
     */
    public const RESUME = 'RESUME';

    /**
     * The action to execute a scheduled swap of a subscription plan in a subscription.
     */
    public const SWAP_PLAN = 'SWAP_PLAN';

    private const _ALL_VALUES = [self::CANCEL, self::PAUSE, self::RESUME, self::SWAP_PLAN];

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
