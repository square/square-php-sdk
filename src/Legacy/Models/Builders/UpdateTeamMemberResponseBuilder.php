<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\TeamMember;
use Square\Legacy\Models\UpdateTeamMemberResponse;

/**
 * Builder for model UpdateTeamMemberResponse
 *
 * @see UpdateTeamMemberResponse
 */
class UpdateTeamMemberResponseBuilder
{
    /**
     * @var UpdateTeamMemberResponse
     */
    private $instance;

    private function __construct(UpdateTeamMemberResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Team Member Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateTeamMemberResponse());
    }

    /**
     * Sets team member field.
     *
     * @param TeamMember|null $value
     */
    public function teamMember(?TeamMember $value): self
    {
        $this->instance->setTeamMember($value);
        return $this;
    }

    /**
     * Sets errors field.
     *
     * @param Error[]|null $value
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new Update Team Member Response object.
     */
    public function build(): UpdateTeamMemberResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
