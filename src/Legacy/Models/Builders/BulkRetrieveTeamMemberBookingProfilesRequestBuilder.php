<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkRetrieveTeamMemberBookingProfilesRequest;

/**
 * Builder for model BulkRetrieveTeamMemberBookingProfilesRequest
 *
 * @see BulkRetrieveTeamMemberBookingProfilesRequest
 */
class BulkRetrieveTeamMemberBookingProfilesRequestBuilder
{
    /**
     * @var BulkRetrieveTeamMemberBookingProfilesRequest
     */
    private $instance;

    private function __construct(BulkRetrieveTeamMemberBookingProfilesRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Retrieve Team Member Booking Profiles Request Builder object.
     *
     * @param string[] $teamMemberIds
     */
    public static function init(array $teamMemberIds): self
    {
        return new self(new BulkRetrieveTeamMemberBookingProfilesRequest($teamMemberIds));
    }

    /**
     * Initializes a new Bulk Retrieve Team Member Booking Profiles Request object.
     */
    public function build(): BulkRetrieveTeamMemberBookingProfilesRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
