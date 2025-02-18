<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListLoyaltyProgramsResponse;
use Square\Legacy\Models\LoyaltyProgram;

/**
 * Builder for model ListLoyaltyProgramsResponse
 *
 * @see ListLoyaltyProgramsResponse
 */
class ListLoyaltyProgramsResponseBuilder
{
    /**
     * @var ListLoyaltyProgramsResponse
     */
    private $instance;

    private function __construct(ListLoyaltyProgramsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Loyalty Programs Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListLoyaltyProgramsResponse());
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
     * Sets programs field.
     *
     * @param LoyaltyProgram[]|null $value
     */
    public function programs(?array $value): self
    {
        $this->instance->setPrograms($value);
        return $this;
    }

    /**
     * Initializes a new List Loyalty Programs Response object.
     */
    public function build(): ListLoyaltyProgramsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
