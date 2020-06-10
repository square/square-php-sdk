<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The current state of this fulfillment.
 */
class OrderFulfillmentState
{
    /**
     * Indicates the fulfillment has been proposed.
     */
    public const PROPOSED = 'PROPOSED';

    /**
     * Indicates the fulfillment has been reserved.
     */
    public const RESERVED = 'RESERVED';

    /**
     * Indicates the fulfillment has been prepared.
     */
    public const PREPARED = 'PREPARED';

    /**
     * Indicates the fulfillment was successfully completed.
     */
    public const COMPLETED = 'COMPLETED';

    /**
     * Indicates the fulfillment was canceled.
     */
    public const CANCELED = 'CANCELED';

    /**
     * Indicates the fulfillment failed to be completed but was not explicitly
     * canceled.
     */
    public const FAILED = 'FAILED';
}
