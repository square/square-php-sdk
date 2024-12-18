<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkUpdateTeamMembersRequest;
use Square\Models\UpdateTeamMemberRequest;

/**
 * Builder for model BulkUpdateTeamMembersRequest
 *
 * @see BulkUpdateTeamMembersRequest
 */
class BulkUpdateTeamMembersRequestBuilder
{
    /**
     * @var BulkUpdateTeamMembersRequest
     */
    private $instance;

    private function __construct(BulkUpdateTeamMembersRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Update Team Members Request Builder object.
     *
     * @param array<string,UpdateTeamMemberRequest> $teamMembers
     */
    public static function init(array $teamMembers): self
    {
        return new self(new BulkUpdateTeamMembersRequest($teamMembers));
    }

    /**
     * Initializes a new Bulk Update Team Members Request object.
     */
    public function build(): BulkUpdateTeamMembersRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
