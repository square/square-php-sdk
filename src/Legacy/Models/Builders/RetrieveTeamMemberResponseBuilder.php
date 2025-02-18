<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\RetrieveTeamMemberResponse;
use Square\Legacy\Models\TeamMember;

/**
 * Builder for model RetrieveTeamMemberResponse
 *
 * @see RetrieveTeamMemberResponse
 */
class RetrieveTeamMemberResponseBuilder
{
    /**
     * @var RetrieveTeamMemberResponse
     */
    private $instance;

    private function __construct(RetrieveTeamMemberResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Team Member Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveTeamMemberResponse());
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
     * Initializes a new Retrieve Team Member Response object.
     */
    public function build(): RetrieveTeamMemberResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
