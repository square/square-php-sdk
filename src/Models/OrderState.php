<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The state of the order.
 */
class OrderState
{
    /**
     * Indicates the order is open. Open orders may be updated.
     */
    public const OPEN = 'OPEN';

    /**
     * Indicates the order is completed. Completed orders are fully paid. This is a terminal state.
     */
    public const COMPLETED = 'COMPLETED';

    /**
     * Indicates the order is canceled. Canceled orders are not paid. This is a terminal state.
     */
    public const CANCELED = 'CANCELED';
}
