<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkRetrieveTeamMemberBookingProfilesResponse;

/**
 * Builder for model BulkRetrieveTeamMemberBookingProfilesResponse
 *
 * @see BulkRetrieveTeamMemberBookingProfilesResponse
 */
class BulkRetrieveTeamMemberBookingProfilesResponseBuilder
{
    /**
     * @var BulkRetrieveTeamMemberBookingProfilesResponse
     */
    private $instance;

    private function __construct(BulkRetrieveTeamMemberBookingProfilesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk retrieve team member booking profiles response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkRetrieveTeamMemberBookingProfilesResponse());
    }

    /**
     * Sets team member booking profiles field.
     */
    public function teamMemberBookingProfiles(?array $value): self
    {
        $this->instance->setTeamMemberBookingProfiles($value);
        return $this;
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new bulk retrieve team member booking profiles response object.
     */
    public function build(): BulkRetrieveTeamMemberBookingProfilesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
