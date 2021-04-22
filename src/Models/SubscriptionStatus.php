<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Possible subscription status values.
 */
class SubscriptionStatus
{
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

    /**
     * The subscription is deactivated.
     */
    public const DEACTIVATED = 'DEACTIVATED';
}
