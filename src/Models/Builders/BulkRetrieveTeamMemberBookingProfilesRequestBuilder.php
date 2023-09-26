<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkRetrieveTeamMemberBookingProfilesRequest;

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
     * Initializes a new bulk retrieve team member booking profiles request Builder object.
     */
    public static function init(array $teamMemberIds): self
    {
        return new self(new BulkRetrieveTeamMemberBookingProfilesRequest($teamMemberIds));
    }

    /**
     * Initializes a new bulk retrieve team member booking profiles request object.
     */
    public function build(): BulkRetrieveTeamMemberBookingProfilesRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
