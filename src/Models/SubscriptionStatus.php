<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Possible subscription status values.
 */
class SubscriptionStatus
{
    public const DEFAULT_SUBSCRIPTION_STATUS_DO_NOT_USE = 'DEFAULT_SUBSCRIPTION_STATUS_DO_NOT_USE';

    /**
     * The subscription starts in the future.
     */
    public const PENDING = 'PENDING';

    /**
     * The subscription is active.
     */
    public const ACTIVE = 'ACTIVE';

    /**
     * The subscription is canceled.
     */
    public const CANCELED = 'CANCELED';
}
