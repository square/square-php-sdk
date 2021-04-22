<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The possible subscription event info codes.
 */
class SubscriptionEventInfoCode
{
    /**
     * The location is not active.
     */
    public const LOCATION_NOT_ACTIVE = 'LOCATION_NOT_ACTIVE';

    /**
     * The location cannot accept payments.
     */
    public const LOCATION_CANNOT_ACCEPT_PAYMENT = 'LOCATION_CANNOT_ACCEPT_PAYMENT';

    /**
     * The customer has been deleted.
     */
    public const CUSTOMER_DELETED = 'CUSTOMER_DELETED';

    /**
     * The customer doesn't have an email.
     */
    public const CUSTOMER_NO_EMAIL = 'CUSTOMER_NO_EMAIL';

    /**
     * The customer doesn't have a name.
     */
    public const CUSTOMER_NO_NAME = 'CUSTOMER_NO_NAME';
}
