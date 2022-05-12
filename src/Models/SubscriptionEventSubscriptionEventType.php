<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Supported types of an event occurred to a subscription.
 */
class SubscriptionEventSubscriptionEventType
{
    /**
     * The subscription was started.
     */
    public const START_SUBSCRIPTION = 'START_SUBSCRIPTION';

    /**
     * The subscription plan was changed.
     */
    public const PLAN_CHANGE = 'PLAN_CHANGE';

    /**
     * The subscription was stopped.
     */
    public const STOP_SUBSCRIPTION = 'STOP_SUBSCRIPTION';

    /**
     * The subscription was deactivated
     */
    public const DEACTIVATE_SUBSCRIPTION = 'DEACTIVATE_SUBSCRIPTION';

    /**
     * The subscription was resumed.
     */
    public const RESUME_SUBSCRIPTION = 'RESUME_SUBSCRIPTION';

    /**
     * The subscription was paused.
     */
    public const PAUSE_SUBSCRIPTION = 'PAUSE_SUBSCRIPTION';

    private const _ALL_VALUES = [
        self::START_SUBSCRIPTION,
        self::PLAN_CHANGE,
        self::STOP_SUBSCRIPTION,
        self::DEACTIVATE_SUBSCRIPTION,
        self::RESUME_SUBSCRIPTION,
        self::PAUSE_SUBSCRIPTION,
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
