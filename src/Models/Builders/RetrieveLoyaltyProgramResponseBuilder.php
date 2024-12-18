<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\LoyaltyProgram;
use Square\Models\RetrieveLoyaltyProgramResponse;

/**
 * Builder for model RetrieveLoyaltyProgramResponse
 *
 * @see RetrieveLoyaltyProgramResponse
 */
class RetrieveLoyaltyProgramResponseBuilder
{
    /**
     * @var RetrieveLoyaltyProgramResponse
     */
    private $instance;

    private function __construct(RetrieveLoyaltyProgramResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Loyalty Program Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveLoyaltyProgramResponse());
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
     * Sets program field.
     *
     * @param LoyaltyProgram|null $value
     */
    public function program(?LoyaltyProgram $value): self
    {
        $this->instance->setProgram($value);
        return $this;
    }

    /**
     * Initializes a new Retrieve Loyalty Program Response object.
     */
    public function build(): RetrieveLoyaltyProgramResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
