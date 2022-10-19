<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The type of fulfillment.
 */
class FulfillmentType
{
    /**
     * A recipient to pick up the fulfillment from a physical [location]($m/Location).
     */
    public const PICKUP = 'PICKUP';

    /**
     * A shipping carrier to ship the fulfillment.
     */
    public const SHIPMENT = 'SHIPMENT';
}
