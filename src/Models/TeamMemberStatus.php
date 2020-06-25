<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Enumerates the possible statuses the team member can have within a business.
 */
class TeamMemberStatus
{
    /**
     * The team member can log in to Point of Sale and Dashboard.
     */
    public const ACTIVE = 'ACTIVE';

    /**
     * The team member can no longer log in to Point of Sale or Dashboard,
     * but their sales reports remain available.
     */
    public const INACTIVE = 'INACTIVE';
}
