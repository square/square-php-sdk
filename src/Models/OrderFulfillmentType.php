<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The type of fulfillment.
 */
class OrderFulfillmentType
{
    /**
     * A fulfillment to be picked up from a physical [location]($m/Location)
     * by a recipient.
     */
    public const PICKUP = 'PICKUP';

    /**
     * A fulfillment to be shipped by a shipping carrier.
     */
    public const SHIPMENT = 'SHIPMENT';
}
