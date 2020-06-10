<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The status of the location, whether a location is active or inactive.
 */
class LocationStatus
{
    /**
     * A location that is active for business.
     */
    public const ACTIVE = 'ACTIVE';

    /**
     * A location that is not active for business. Inactive locations just provide historical
     * information, so typically clients limit interaction with or hide these locations.
     */
    public const INACTIVE = 'INACTIVE';
}
