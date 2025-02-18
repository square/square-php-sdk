<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListTeamMemberWagesResponse;
use Square\Legacy\Models\TeamMemberWage;

/**
 * Builder for model ListTeamMemberWagesResponse
 *
 * @see ListTeamMemberWagesResponse
 */
class ListTeamMemberWagesResponseBuilder
{
    /**
     * @var ListTeamMemberWagesResponse
     */
    private $instance;

    private function __construct(ListTeamMemberWagesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Team Member Wages Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListTeamMemberWagesResponse());
    }

    /**
     * Sets team member wages field.
     *
     * @param TeamMemberWage[]|null $value
     */
    public function teamMemberWages(?array $value): self
    {
        $this->instance->setTeamMemberWages($value);
        return $this;
    }

    /**
     * Sets cursor field.
     *
     * @param string|null $value
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
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
     * Initializes a new List Team Member Wages Response object.
     */
    public function build(): ListTeamMemberWagesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
