<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The possible subscription event types.
 */
class SubscriptionEventSubscriptionEventType
{
    /**
     * The subscription started.
     */
    public const START_SUBSCRIPTION = 'START_SUBSCRIPTION';

    /**
     * The subscription plan changed.
     */
    public const PLAN_CHANGE = 'PLAN_CHANGE';

    /**
     * The subscription stopped.
     */
    public const STOP_SUBSCRIPTION = 'STOP_SUBSCRIPTION';
}
